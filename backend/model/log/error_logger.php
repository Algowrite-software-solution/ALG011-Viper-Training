<?php


class ErrorLogger
{
    private $logDirectory;

    public function __construct($logDirectory)
    {
        $this->logDirectory = $logDirectory;
        date_default_timezone_set('Asia/Colombo');
    }

    public function logError($error, $metadata = [])
    {
        $now = new DateTime();
        $logDate = $now->format('Y-m-d H-i');
        $logPath = $this->logDirectory . DIRECTORY_SEPARATOR . $logDate . '.log';

        $logEntry = "[" . $now->format('Y-m-d H:i:s') . "] " . $error . PHP_EOL;
        if (!empty($metadata)) {
            $logEntry .= "Metadata: " . json_encode($metadata) . PHP_EOL . PHP_EOL;
            $logEntry .= "Info: " . json_encode($this->getUserInfo()) . PHP_EOL . PHP_EOL;
        }

        if (!file_exists($logPath)) {
            touch($logPath);
        }

        file_put_contents($logPath, $logEntry, FILE_APPEND);

        // Delete files older than one month
        $this->deleteOldFiles($this->logDirectory, 60 * 60);
    }

    private function deleteOldFiles($directory, $secondsThreshold)
    {
        $thresholdTime = time() - $secondsThreshold;
        $directoryContents = scandir($directory);

        foreach ($directoryContents as $file) {
            $filePath = $directory . DIRECTORY_SEPARATOR . $file;
            if (is_file($filePath)) {
                if (filectime($filePath) < $thresholdTime) {
                    unlink($filePath);
                }
            }
        }
    }

    private function getUserInfo()
    {
        $userInfo = new stdClass();

        // User Agent
        $userInfo->userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

        // IP Address
        $userInfo->ipAddress = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

        // Request Headers
        $userInfo->acceptLanguage = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
        $userInfo->referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        // Session Information
        session_start(); // Start the session (if not started already)
        $userInfo->sessionId = session_id();

        // Cookies
        $userInfo->cookieValue = isset($_COOKIE['cookie_name']) ? $_COOKIE['cookie_name'] : '';

        // Query Parameters
        $userInfo->paramValue = isset($_GET['param_name']) ? $_GET['param_name'] : '';

        // POST Data
        $userInfo->postData = $_POST; // This includes all POST data

        return $userInfo;
    }


    // finalized one for long time period
    // private function deleteOldFiles($directory, $daysThreshold) {
    //     $thresholdDate = new DateTime("-$daysThreshold days");
    //     $directoryContents = scandir($directory);

    //     foreach ($directoryContents as $file) {
    //         $filePath = $directory . DIRECTORY_SEPARATOR . $file;
    //         if (is_file($filePath)) {
    //             $fileCreationDate = new DateTime(date('Y-m-d', filectime($filePath)));
    //             if ($fileCreationDate < $thresholdDate) {
    //                 unlink($filePath);
    //             }
    //         }
    //     }
    // }
}

// Example usage
$logDirectory = '../../util/log/';
$logger = new ErrorLogger($logDirectory);

$error = "An error occurred.";
$metadata = [
    'request_data' => ['param1' => 'value1', 'param2' => 'value2'],
    'ip_address' => $_SERVER['REMOTE_ADDR']
];

$logger->logError($error, $metadata);
