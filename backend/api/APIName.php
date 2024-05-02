<?php

/**
 * @author : Author Name
 * @description : This file is an Example for developing an API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class APIName extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }
       //data method
       protected function processname()
       {
              //if (!self::isGetMethod()) {
              //       return (INVALID_REQUEST_METHOD);
              //}
              //return self::response(1, "testing mode on"); // json response
//
              //self::setResponseToText(); // text response
              //return "testing mode on";

              //Example Usage of methods
              // $userId = $_GET['user_id'] ?? null; // getting query parameters from requests

              // using data validators (you must configoure the validator model)
              // $validateReadyArray = [
              //        "password" => [ "password" => $password]
              // ];
              // return ($error = $this->validateData($validateReadyArray)) ? $error : "success";

              // access database and proform queris with prepared statements or jsut queris.
              // return $this->dbCall("SELECT * FROM `user` WHERE `user_id`=?", 'i', [$userId]);

              $databaseOperation = $this->crudOperator;
             // $databaseOperation->insert('test_1',$_POST);
              //$databaseOperation->update('test_1',$_POST,array('col_1'=>34,'col_2'=>'hf'));

       }
}
