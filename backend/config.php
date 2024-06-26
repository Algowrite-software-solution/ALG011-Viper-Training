<?php
// server config
define("ROOT", "http://localhost:9001/");
define("SESSION_VARIABLE_ADMIN", "alg011_admin");
define("SESSION_VARIABLE_USER", "alg011_user");

// database config
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "******");
define("DB_DATABASE", "alg011_db");

//constants
global $IS_RESPONSE_TEXT;
$IS_RESPONSE_TEXT = false;

// error messages
define("API_404_MESSAGE", "Invalid API URL");
define("INVALID_REQUEST_METHOD", "Invalid request method");

// frontend config
require_once(__DIR__ . "/../public/config.php");
