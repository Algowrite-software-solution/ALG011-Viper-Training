<?php

class DatabaseBackup
{

    private $mysqli;
    private $dbName;
    private $backupPrefix;
    private $compress;
    private $encryption;

    public function __construct(
        mysqli $mysqli,
        string $dbName,
        string $backupPrefix = 'backup_',
        bool $compress = true,
        bool $encryption = false
    ) {
        $this->mysqli = $mysqli;
        $this->dbName = $dbName;
        $this->backupPrefix = $backupPrefix;
        $this->compress = $compress;
        $this->encryption = $encryption;

        if (!$mysqli->ping()) {
            throw new Exception("Failed to connect to database: " . $mysqli->connect_error);
        }
    }

    public function createBackup()
    {
        $timestamp = date('Y-m-d_His');
        $fileName = $this->backupPrefix . $timestamp;

        // Generate SQL structure and data
        $sqlStructure = $this->getStructureDump();
        $sqlData = $this->getDataDump();

        // Combine structure and data into a single string
        $sqlDump = $sqlStructure . "\n\n" . $sqlData;

        // Compress if enabled
        if ($this->compress) {
            $sqlDump = gzcompress($sqlDump);
        }

        // Encrypt if enabled
        if ($this->encryption) {
            // Implement your preferred encryption method here
            // This example uses a placeholder function for illustration
            $sqlDump = $this->encrypt($sqlDump);
        }

        // Write the backup to a file
        if (file_put_contents($fileName, $sqlDump)) {
            return $fileName;
        } else {
            throw new Exception("Failed to write backup file: $fileName");
        }
    }

    private function getStructureDump()
    {
        $sql = [];
        $result = $this->mysqli->query("SHOW TABLES IN `$this->dbName`");
        while ($row = $result->fetch_assoc()) {
            $table = $row['Tables_in_' . DB_DATABASE];
            $sql[] = "DROP TABLE IF EXISTS `" . $table . "`;";
            $result2 = $this->mysqli->query("SHOW CREATE TABLE `" . $table . "`");
            $row2 = $result2->fetch_assoc();
            $sql[] = $row2['Create Table'] . ";\n";
        }
        return implode("\n", $sql);
    }

    private function getDataDump(): string
    {
        $sql = [];
        $result = $this->mysqli->query("SHOW TABLES IN `$this->dbName`");
        while ($row = $result->fetch_assoc()) {
            $table = $row['Tables_in_' . DB_DATABASE];
            $result2 = $this->mysqli->query("SELECT * FROM `" . $table . "`");
            while ($row2 = $result2->fetch_assoc()) {
                $values = [];
                foreach ($row2 as $key => $value) {
                    $values[] = "`" . $key . "` = '" . $this->mysqli->escape_string($value) . "'";
                }
                $sql[] = "INSERT INTO `" . $table . "` (" . implode(", ", $values) . ") VALUES (" . implode(", ", $values) . ");";
            }
        }
        return implode("\n", $sql);
    }

    // Placeholder encryption function (implement your preferred method here)
    private function encrypt(string $data): string
    {
        // Example using Mcrypt (requires Mcrypt extension):
        // $key = 'your_encryption_key';
        // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-128-cbc'));
        // return openssl_encrypt($data, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
        throw new Exception("Encryption is not implemented yet. Please provide your preferred encryption method.");
    }
}
