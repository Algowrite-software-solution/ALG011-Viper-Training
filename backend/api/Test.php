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
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       //data method
       protected function process()
       {
              // $operator = new DatabaseBackup($this->databaseDriver->connection, DB_DATABASE);
              // $operator->createBackup();
              $dbResults = $this->crudOperator->select("user", ["user_id" => 20]);
              if (count($dbResults)) {
                     return self::response(1, $dbResults);
              }
              return self::response(2, "no result found");
       }
}
