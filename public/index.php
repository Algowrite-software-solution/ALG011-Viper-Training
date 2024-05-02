<?php
require_once(__DIR__ . "/../backend/config.php");
require_once(__DIR__ . "/../backend/router/Router.php");

//initiate router
$router = new Router();
$router->routerInit();
