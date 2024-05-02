<?php

/**
 * @Title: Router.php 
 * @author: madusha pravinda
 * @Developed Date: 13 - JANUARY - 2024
 * @LastUpdated : 14 - JANUARY - 2024
 * @version: Release 1.0.1
 * @Description: The Router class identifies routes 
 * @link https://stackoverflow.com/questions/20960877/the-basics-of-php-routing
 * @link https://www.freecodecamp.org/news/how-to-build-a-routing-system-in-php/
 * @link https://tech.jotform.com/what-is-router-and-how-to-create-your-own-router-with-php-fad811cf2873
 */
//import statement
require_once(__DIR__ . "/View.php");

/**
 * this class initializes the application routes and identify API or View instances
 * @author: madusha pravinda
 */
class Router
{
       use ResponseSender;

       protected  $urlPaths = [];
       protected $apiPath = __DIR__ . "/../api/";
       protected $URL = "";
       // initialize request - madusha pravinda
       public function routerInit()
       {
              // get the URL
              $this->URL = explode('?', trim($_SERVER['REQUEST_URI'], '/'))[0];
              // get the url path
              $this->urlPaths = explode('/', $this->URL);
              // find the URL paths have a api
              if ($this->urlPaths[0] === 'api') {
                     array_shift($this->urlPaths);
                     $this->callApi($this->urlPaths);
              } else if ($this->urlPaths[0] === 'comp') {
                     array_shift($this->urlPaths);
                     $this->loadComp($this->URL);
              } else {
                     $this->loadView($this->URL);
              }
       }

       /**
        * call related api class
        * @param array $URLPath
        */
       public function callApi(array $URLPath)
       {
              //upper case first character url path
              $API = ucfirst(($URLPath[0]) ?? null);
              // check if file path is exist
              if (file_exists($filePath = $this->apiPath . $API . ".php")) {
                     require_once $filePath;
                     array_shift($URLPath);
                     //create a related api object
                     new $API($URLPath);
              } else {
                     $this->sendJson(API_404_MESSAGE);
              }
       }

       /**
        * call page view class
        * @param string $URL
        */
       public function loadView(string $URL)
       {
              //initialize View class and pass the URL to View constructor
              new View($URL);
       }

       /**
        * load components
        * @param string $URL
        */
       public function loadComp(string $URL)
       {
              //initialize View class and pass the URL to View constructor
              new View($URL, true);
       }
}
