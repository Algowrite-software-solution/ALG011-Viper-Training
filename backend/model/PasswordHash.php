<?php

class PasswordHash
{
    // Encryption method using SHA-256

    private static string $salt = "1h2369h5ythf7d6r"; // your hash

    public static function hash($password)
    {
        $hash = hash('sha256', $password . self::$salt);
        return $hash;
    }

    // Verifier using SHA-256
    public static function isValid($password, $hash)
    {
        $hashedfromdb = hash('sha256', $password . self::$salt);
        return hash_equals($hashedfromdb, $hash);
    }
}