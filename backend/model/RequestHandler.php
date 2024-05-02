<?php
trait RequestHandler
{
    // validate the request methods
    // post
    public static function isPostMethod()
    {
        return ($_SERVER["REQUEST_METHOD"] === "POST") ? true : false;
    }

    // get
    public static function isGetMethod()
    {
        return ($_SERVER["REQUEST_METHOD"] === "GET") ? true : false;
    }

    // check for the existant of the given request method parameters
    public static function postMethodHasError(...$variables)
    {
        $error = null;
        if (self::isPostMethod()) {
            foreach ($variables as $value) {
                if (!isset($_POST[$value])) {
                    $error = "invalid request method parameter";
                    break;
                } else if (empty(trim($_POST[$value]))) {
                    $error = "empty value for " . $value;
                    break;
                }
            }
        } else {
            $error =  "invalid method";
        }
        return $error;
    }

    public static function getMethodHasError(...$variables)
    {
        $error = null;
        if (self::isGetMethod()) {
            foreach ($variables as $value) {
                if (!isset($_GET[$value])) {
                    $error = "invalid request method parameter";
                    break;
                } else if (empty(trim($_GET[$value]))) {
                    $error = "empty value for " . $value;
                    break;
                }
            }
        } else {
            $error =  "invalid method";
        }
        return $error;
    }
}
