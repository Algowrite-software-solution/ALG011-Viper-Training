<?php

/**
 * @author : Janith Nirmal
 * @description : this is the test API for system updates.
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/DatabaseBackupHandler.php';

class SubTask extends Api
{
       public function __construct($apiPath, protected $isAPI = true)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              if ($isAPI) {
                     $this->init($this);
              }
       }

       //data method
       public function write($taskId = null) // usign REQ, using Method call
       {


              $id = ($taskId) ? $taskId : ($_GET["id"] ?? null);

              if (!$id) {
                     return ($this->isAPI) ? self::response(2, "Fuck you!") : false;
              }

              $filename = __DIR__ . "/../bin/test.txt";
              $fileContent = file_get_contents($filename);
              $fileContent .= $id . " is the new ID \n";
              file_put_contents($filename, $fileContent);

              return ($this->isAPI) ? self::response(1) : true;
       }
}
