<?php

/**
 * @author : Eshmika
 * @description : Register API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class User extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }
       //data method
       protected function register()
       {
              if (!self::isPostMethod()) {
                    return (INVALID_REQUEST_METHOD);
              }                         
              
              $data = $_POST;  
              $email = $data['email'];              

              $validator = new DataValidator();

              $validationRules = [
                     'email' => ['email' => $email] 
              ];

              $validationErrors = $validator->validate($validationRules);

              if (count((array)$validationErrors) > 0) {                     
                     return ("Email has error");
                 } else {                    
                     $email = $_POST['email'];
                     $password = $_POST['password'];
                     // return($email . " " . $password);

                     $tableName = 'user';
                     $insertData = [
                            'email' => $email,
                            'password' => $password
                        ];

                     $databaseOperation = $this->crudOperator;
                     $result = $databaseOperation->insert($tableName, $insertData);

                     if ($result) {
                            return "User registered successfully";
                     } else {
                            return "User registration failed"; 
                     }
              }


       }
}
