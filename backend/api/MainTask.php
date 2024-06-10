<?php

/**
 * @author : Author Name
 * @description : This file is an Example for developing an API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/SubTask.php';

class MainTask extends Api
{

       public function __construct(protected $apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }
       //data method
       protected function process()
       {

              $name = $_GET["name"] ?? null;

              // Subtask write
              $subTask = new SubTask($this->apiPath, false);
              $response = $subTask->write(3434);

              return ($response) ? self::response(1) : self::response(2, "Somethign Went Wrong!");
       }
}
