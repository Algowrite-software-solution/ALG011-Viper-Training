<?php

/**
 * @author : Author Name
 * @description : This file is an Example for developing an API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/Test.php';

class Malidu extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }
       //data method
       public function processname()
       {
              if (!self::isPostMethod()) {
                     return (INVALID_REQUEST_METHOD);
              }
              
              if(self::postMethodHasError('name','age','password')){
                return self::response(2,'missing parameters');
              }
              $test=new Test(array(),false);
              return $test->process();
              
              $name=$_POST['name'] ??null;
              $age=$_POST['age'] ??null;
              $password=$_POST['password'] ??null;
              $role=$_POST['role'] ??null;


              // using data validators (you must configoure the validator model)
              $validateReadyArray = [
                     "id_int" => [ "age" => $age],
                     "name" => [ "name" => $name],
                     "password" => [ "password" => $password],
              ];
              $error = $this->validateData($validateReadyArray);
              if(!empty($error)){
                return self::response(3,$error);
              }

              $result=$this->crudOperator->update('user_role',array('role'=>$role),array('id'=>9));



              //$this->dbCall()





           


              return self::response(1,$result);




       }
}
