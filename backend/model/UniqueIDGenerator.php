<?php

/**
 * Class UniqueIDGenerator
 * Generates unique IDs based on specified parameters.
 */
class UniqueIDGenerator
{
    private $databaseDriver;

    /**
     * UniqueIDGenerator constructor.
     *
     * @param DatabaseDriver $databaseDriver The database driver instance.
     */
    public function __construct(DatabaseDriver $databaseDriver)
    {
        $this->databaseDriver = $databaseDriver;
    }

    /**
     * Generates a unique ID.
     *
     * @param string $tableName The name of the table where the ID will be checked.
     * @param string $columnName The name of the column in the table where the ID will be checked.
     * @param int $length The length of the unique ID to be generated.
     * @return string The generated unique ID.
     */
    public function generateUniqueID($tableName, $columnName, $length)
    {
        // Generate a random unique ID
        $uniqueID = $this->generateRandomID($length);

        // Check if the generated ID already exists in the database
        while ($this->isIDExists($tableName, $columnName, $uniqueID)) {
            // If the ID exists, generate a new one until it's unique
            $uniqueID = $this->generateRandomID($length);
        }

        return $uniqueID;
    }

    /**
     * Generates a random ID of specified length.
     *
     * @param int $length The length of the ID to be generated.
     * @return string The generated random ID.
     */
    private function generateRandomID($length)
    {
        // Generate a random unique ID of specified length
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Checks if a given ID exists in the specified table and column in the database.
     *
     * @param string $tableName The name of the table where the ID will be checked.
     * @param string $columnName The name of the column in the table where the ID will be checked.
     * @param string $uniqueID The unique ID to be checked for existence.
     * @return bool True if the ID exists, false otherwise.
     */
    private function isIDExists($tableName, $columnName, $uniqueID)
    {
        // Prepare the query to check if the ID exists in the specified table and column
        $query = "SELECT COUNT(*) AS count FROM $tableName WHERE $columnName = ?";

        // Execute the query with the unique ID as a parameter
        $result = $this->databaseDriver->execute_query($query, 's', [$uniqueID]);

        // Fetch the result
        $row = $result->fetch_assoc();

        // Check if any rows were returned (indicating that the ID exists)
        return $row['count'] > 0;
    }
}
