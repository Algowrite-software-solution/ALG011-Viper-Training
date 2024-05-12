<?php
//routes
define("ROUTES", [
    [
        "routes" => ["pagename"],
        "fileName" => "pagename",
        "title" => "Page Title",
        "js" => ["pagename"],
        "css" => ["pagename"],
        "isCustom" => false
    ],[
        "routes" => ["test"],
        "fileName" => "test",
        "title" => "ALGLIB_002 | Test Page",
        "js" => ["test"],
        "css" => ["test"],
        "isCustom" => false
    ],[
        "routes" => ["","home"],
        "fileName" => "home",
        "title" => "ALGLIB_002 | Home Page",
        "js" => ["home"],
        "css" => ["home"],
        "isCustom" => true
    ],[
        "routes" => ["login"],
        "fileName" => "signin",
        "title" => "ALGLIB_002 | Signin Page",
        "js" => [],
        "css" => ["signin"],
        "isCustom" => true
    ],
    [
        "routes" => ["register"],
        "fileName" => "register",
        "title" => "ALGLIB_002 | register Page",
        "js" => [],
        "css" => ["register"],
        "isCustom" => true
    ],
]);
