<?php

/**
 * @author Madusha Pravinda
 * @date 13 - JANUARY - 2024
 * @Last Updated : 19 - JANUARY - 2024
 * @version Release 1.0.0
 * @description : The Api class, extending a base Controller, represents a contact-related data model in a PHP application. 
 * It includes a constructor to set the API path, 
 * along with methods for getting, updating, and validating data from a database.
 */

//packages
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/DataValidator.php");
require_once __DIR__ . '/../model/CrudOperator.php';

/**
 * @author : Madusha Pravinda
 */
class Api extends Controller
{


       protected $apiPath = null;
       protected $crudOperator;


       public function __construct($apiPath)
       {
              parent::__construct();
              $this->apiPath = $apiPath;
              $this->crudOperator = new CrudOperator($this->databaseDriver);
       }

       //api init
       public function init($object)
       {
              $process = array_shift($this->apiPath);
              $callBackMethod = array($object, $process);
              if (is_callable($callBackMethod)) {
                     $response = call_user_func($callBackMethod, $this->apiPath);
                     global $IS_RESPONSE_TEXT;
                     if (true === $IS_RESPONSE_TEXT) {
                            $this->sendText($response);
                     } else {
                            $this->sendJson($response);
                     }
              } else {
                     $this->sendJson(API_404_MESSAGE);
              }
       }

       /**
        * @param string $query
        * @param array $data
        * @param string $type
        */
       //this function use get the data from the database
       public function dbCall(string $query, string $types = null, array $data = null)
       {
              //check $types and $data null
              if ($types && $data) {
                     return $this->databaseDriver->execute_query($query, $types, $data)->fetch_all(1);
              }
              return $this->databaseDriver->query($query)->fetch_all(1);
       }

       /**
        * @param array $data
        */
       //this function use validate the data from the database
       public function validateData(array $data)
       {
              //data validate model
              $dataValidate = new DataValidator();
              $errors = [];
              foreach ($dataValidate->validate($data) as $data => $error) {
                     if ($data) {
                            array_push($errors, "$error at : $data");
                     }
              }
              return (count($errors) != 0) ? $errors : null;
       }
}
