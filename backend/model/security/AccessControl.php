<?php

/**
 * @author Madusha Pravinda 
 * @link https://www.joelverhagen.com/blog/2010/12/block-ip-addresses-in-php
 * @link https://www.phpjabbers.com/how-to-block-an-ip-address-from-visiting-a-website-php75.html
 * @link https://perishablepress.com/how-to-block-ip-addresses-with-php/#:~:text=Simply%20edit%2C%20copy%20and%20paste,111%22%2C%20%22222.222.
 * @version Release 1.0.0
 * @date 01 - MARCH - 2024
 * @description this code provides a basic mechanism to enforce rate limiting and ban IP addresses that exceed the defined request threshold.
 */

class AccessControl
{
    // File to store request counts
    private $visitCountFile = 'doc/visit_counts.json';
    // File to store banned Ips
    private $bannedIps = 'doc/banned_ips.txt';
    // Set the threshold for the number of requests within a minute
    private $threshold = 100;

    public function hasAccess()
    {
        $userIp = $this->getClientIp();
        return $this->isIpBanned($userIp);
    }
    // Get the IP address of the client
    private function getClientIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
    //this method get the IP address 
    //returns the IP address @array
    private function getBannedIPs()
    {
        if (file_exists($this->bannedIps)) {
            $bannedIps = json_decode(file_get_contents($this->bannedIps, true));
            return $bannedIps;
        }
        return [];
    }
    //this function reads the banned IPs and check if they are existing
    //@return boolean
    //address are existing returned true if they are, false otherwise
    private function bannedFilesIpReader(mixed $ip)
    {
        foreach ($this->getBannedIPs() as $key => $bannedIp) {
            if ($ip == $key) {
                return true;
            }
            return false;
        }
    }
    //this method is called get a current time Stamp from the server
    private function getCurrentTimeStamp()
    {
        return $_SERVER['REQUEST_TIME'];
    }
    // this method to check if an IP address should be banned
    private function isIpBanned(mixed $ip)
    {
        if ($this->bannedFilesIpReader($ip)) {
            return true;
        }
        $visitCount = $this->incrementVisitCount($ip);
        if ($visitCount >= $this->threshold) {
            $bannedResult[$ip] = ["timeStamp" => $this->getCurrentTimeStamp(), "status" => "Temporary Banned IP Address"];
            $json = json_encode($bannedResult, JSON_PRETTY_PRINT);
            file_put_contents($this->bannedIps, $json);
            return true;
        }
        return false;
    }
    // this method read and update the count
    private function incrementVisitCount(mixed $ip)
    {
        $visitCounts = $this->loadVisitCounts();
        // Read the request counts from the file
        if (!isset($visitCounts[$ip])) {
            $visitCounts[$ip] = ["count" => 0, "time" => $this->getCurrentTimeStamp()];
        }
        // Update the request count and timestamp if the last request was more than a minute ago
        if (($this->getCurrentTimeStamp() - $visitCounts[$ip]["time"]) >= 60) {
            $visitCounts[$ip] = ["count" => 1, "time" => $this->getCurrentTimeStamp()];
        }
        $visitCounts[$ip]["count"]++;
        $this->saveVisitCounts($visitCounts);
        return $visitCounts[$ip]["count"];
    }
    // this method read visit count
    private function loadVisitCounts()
    {
        if (file_exists($this->visitCountFile)) {
            $json = file_get_contents($this->visitCountFile);
            return json_decode($json, true);
        }
        return [];
    }
    // this method save visit count
    private function saveVisitCounts(array $visitCounts)
    {
        $json = json_encode($visitCounts, JSON_PRETTY_PRINT);
        file_put_contents($this->visitCountFile, $json);
    }
    //Function to remove IPs with timestamp 45 minutes earlier than current time
    // run every 45 minutes using a cron job
    protected function automaticallyUnbannedSystem()
    {
        foreach ($this->getBannedIPs() as $ip => $details) {
            // Calculate the timestamp difference
            $timeDifference = $this->getCurrentTimeStamp() - $details['timeStamp'];
            // If the timestamp is 45 minutes earlier, remove it
            if ($timeDifference >= 45 * 60) {
                unset($bannedIps[$ip]);
            }
        }
    }
}

//testing function
$accessControl = new AccessControl();
if ($accessControl->hasAccess()) {
    echo "Access denied";
} else {
    echo "Access allowed!";
}
