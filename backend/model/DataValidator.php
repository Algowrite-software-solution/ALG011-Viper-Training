<?php

## developer - janith nirmal (02-07-2023)
## validatable types 
##-  id_int
##-- email
##-- text_255
##-- date
##-- phone_number
##-- url
##-- boolean
##-- float
##-- array
##-- json
##-- file
##-- image
##-- name
##-- password

final class DataValidator
{

    private $dataArray;
    private $errorObject;

    function __construct()
    {
        $this->errorObject = new stdClass();
    }

    public function validate($dataArray)
    {
        $this->dataArray = $dataArray;
        foreach ($this->dataArray as $datatype => $dataSet) {
            foreach ($dataSet as $key => $value) {
                $validatorFunctionName = $datatype . "_validator";
                try {
                    $this->$validatorFunctionName($key, $value);
                } catch (\Throwable $th) {
                    throw new Exception("Invalid Data Type : at $datatype", 69);
                }
            }
        }
        return $this->errorObject;
    }


    // string or null validator as integer
    private function string_or_null_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Trim and remove any whitespace
        $value = trim($value);

        // Check if the value is empty, including an empty string
        if (!is_string($value)) {
            $this->errorObject->$key =  "Invalid String for " . $key;
        }
    }

    // int or null validator as integer
    private function int_or_null_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Trim and remove any whitespace
        $value = trim($value);

        // Check if the value is empty, including an empty string
        if (!is_numeric($value) && ($value !== '' || $value !== '0')) {
            return true; // Empty, including empty string, or non-numeric value
            $this->errorObject->$key =  "Invalid id for " . $key;
        }

        // Check if the value is a valid integer
        $intValue = (int)$value; // Attempt to cast to integer

        if ((string)$intValue !== $value) {
            $this->errorObject->$key =  "Invalid id for " . $key;
        }
    }

    // password validator as integer
    private function password_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the password is at least 8 characters long and not longer than 20 characters
        $length = strlen($value);
        if ($length < 8 || $length > 20) {
            $this->errorObject->$key = 'Invalid Character length for password ' . $key;
        }

        // Check if the password contains at least one uppercase letter, one lowercase letter, one number, and one special character
        if (
            !preg_match('/[A-Z]/', $value) ||   // Uppercase letter
            !preg_match('/[a-z]/', $value) ||   // Lowercase letter
            !preg_match('/\d/', $value) ||      // Number
            !preg_match('/[^a-zA-Z\d]/', $value) // Special character
        ) {
            $this->errorObject->$key = 'Invalid Password Format for ' . $key;
        }
    }

    // date validator as integer
    private function date_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the date is not empty
        if (empty($value)) {
            $this->errorObject->$key = 'Empty value for ' . $key;
        }

        // Validate the date format using regex
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            $this->errorObject->$key = 'Invalid Date format for ' . $key;
        }

        // Check if the date is a valid date
        $parsedDate = date_parse($value);
        if (!$parsedDate || $parsedDate['error_count'] > 0 || !checkdate($parsedDate['month'], $parsedDate['day'], $parsedDate['year'])) {
            $this->errorObject->$key = 'Invalid Date at ' . $key;
        }
    }

    // name validator as integer
    private function name_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the name is not empty
        if (empty($value)) {
            $this->errorObject->$key = 'Empty value for ' . $key;
        }

        // Check if the name contains only letters, numbers, underscores, and non-English letters
        if (!preg_match('/^[\p{L}A-Za-z0-9_]+$/u', $value)) {
            $this->errorObject->$key = 'Invalid characters for ' . $key;
        }

        // Check if the name is between 3 and 30 characters long
        if (strlen($value) < 3 || strlen($value) > 30) {
            $this->errorObject->$key = 'A name can only contain 3 to 30 characters at ' . $key;
        }
    }

    // id validator as integer
    private function id_int_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the text is empty
        if (empty($value)) {
            $this->errorObject->$key =  "Empty id for " . $key; // Text is empty
        }

        // id integer validation rules
        if (is_numeric($value) && intval($value) == $value && $value >= 0) {
        } else {
            $this->errorObject->$key =  "Invalid id for " . $key;
        }
    }

    // id validator as integer
    private function email_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Remove leading/trailing white spaces
        $email = trim($value);

        // Check if the text is empty
        if (empty($email)) {
            $this->errorObject->$key =  "Empty email for " . $key; // Text is empty
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorObject->$key =  "Invalid Email for " . $key;
        }
    }

    // id validator as integer
    private function text_255_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];


        // Remove leading/trailing white spaces
        $text = trim($value);

        // Check if the text is empty
        if (empty($text)) {
            $this->errorObject->$key =  "Empty text for " . $key; // Text is empty
        }

        // Validate the text length
        $minLength = 1; // Minimum allowed length
        $maxLength = 255; // Maximum allowed length
        $textLength = strlen($text);

        if ($textLength < $minLength || $textLength > $maxLength) {
            $this->errorObject->$key =  "Invalid text length for " . $key; // Text is empty
        }
    }
    // phone_number validator
    private function phone_number_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Remove leading/trailing white spaces
        $phoneNumber = trim($value);

        // Check if the phone number is empty
        if (empty($phoneNumber)) {
            $this->errorObject->$key =  "Empty phone number for " . $key;
        }

        // Validate phone number format
        if (!preg_match('/^\+?[0-9]{10,15}$/', $phoneNumber)) {
            $this->errorObject->$key =  "Invalid Phone Number for " . $key;
        }
    }

    // url validator
    private function url_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Remove leading/trailing white spaces
        $url = trim($value);

        // Check if the url is empty
        if (empty($url)) {
            $this->errorObject->$key =  "Empty url for " . $key;
        }

        // Validate url format
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->errorObject->$key =  "Invalid URL for " . $key;
        }
    }

    // boolean validator
    private function boolean_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the value is a boolean
        if (!is_bool($value)) {
            $this->errorObject->$key =  "Invalid boolean for " . $key;
        }
    }

    // float validator
    private function float_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the value is a float
        if (!is_float($value)) {
            $this->errorObject->$key =  "Invalid float for " . $key;
        }
    }

    // array validator
    private function array_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the value is an array
        if (!is_array($value)) {
            $this->errorObject->$key =  "Invalid array for " . $key;
        }
    }

    // json validator
    private function json_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the value is a valid JSON
        json_decode($value);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->errorObject->$key =  "Invalid JSON for " . $key;
        }
    }

    // file validator
    private function file_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the file exists
        if (!file_exists($value)) {
            $this->errorObject->$key =  "File does not exist for " . $key;
        }
    }

    // image validator
    private function image_validator(...$dataToValidate)
    {
        $key = $dataToValidate[0];
        $value = $dataToValidate[1];

        // Check if the file is an image
        if (!getimagesize($value)) {
            $this->errorObject->$key =  "Invalid image for " . $key;
        }
    }
}
