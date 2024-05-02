<?php
require_once("middleware/middleware.php");

trait ResponseSender
{
    public static function sendJson(mixed $responseObject, bool $callMiddleware = false): void
    {
        header("Content-Type: application/json");

        echo json_encode($responseObject);
        if ($callMiddleware) {
            self::callMiddleware();
        }
        exit();
    }

    public static function sendText(string $responseText, bool $callMiddleware = false): void
    {
        echo $responseText;
        if ($callMiddleware) {
            self::callMiddleware();
        }
        exit();
    }

    private static function callMiddleware(): void
    {
        $middleware =  new Middleware(1);
        $middleware->execute();
    }


    /**
     * API response json strucutre
     *
     * @param int $status  1 on success or 2 of failiours.
     * @param mixed $data  results or erros will be passed here.
     * @return array associative array that contains response structure
     */
    public static function response(int $status, mixed $data = null)
    {
        $response = [];
        switch ($status) {
            case 1:
                http_response_code(200); // Successful request
                // Optionally set content type for JSON responses:
                $response = ["status" =>  "success"];
                if ($data) {
                    $response["results"] = $data;
                };
                break;
            case 2:
                header('HTTP/1.1 400 Bad Request'); // Bad request error
                $response = ["status" =>  "failed"];
                if ($data) {
                    $response["error"] = $data; // single error
                };
                break;

            case 3:
                header('HTTP/1.1 422 Unprocessable Entity'); // Validation errors
                $response = ["status" =>  "failed"];
                if ($data) {
                    $response["errors"] = $data; // multiple errors 
                };
                break;

            default:
                // Handle any other errors with a generic 500 code
                header('HTTP/1.1 500 Internal Server Error');
                $response = ["status" =>  "failed"];
                if ($data) {
                    $response["error"] = $data;
                };
                break;
        }
        return $response;
    }
}
