<?php

/**
 * @author : Janith Nirmal
 * @description : this is the test API for system updates.
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/DatabaseBackupHandler.php';

class Test extends Api
{
       private $isApi;

       public function __construct($apiPath, $isApi = true)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->isApi=$isApi;

              if ($isApi) {
                     $this->init($this);
              }
       }

       //data method
       public function process()
       {
              if($this->isApi){
              return self::response(1,$_GET);


              }
              return self::response(1,"test rank");
       }
}
