<?php

/**
 * Title : View.php
 * @author : Madusha Pravinda
 * @Developed Date : 13 - JANUARY - 2024
 * @Last Updated : 19 - JANUARY - 2024
 * @version : Release 1.0.1
 * @Description : this class handle our website pages(view pages)
 */
//import statement
require_once(__DIR__ . "/Controller.php");

/**
 * @description : Navigate to the specified URL and page content load , load header content and footer content
 * @param string : $URL
 * @author: madusha pravinda
 */
class View
{
       protected $viewDir = __DIR__ . '/../../public/view/interface/';
       protected $componentDir = __DIR__ . '/../../public/view/component/';

       public function __construct($URL, $isComponent = false)
       {
              $this->navigator($URL, $isComponent);
       }

       /**
        * Navigate to the specified URL
        * @param string : $URL
        * @author: madusha pravinda
        */
       public function navigator($URL, $isComponent)
       {

              if ($isComponent) {
                     $comp = explode("/", $URL)[1] ?? null;
                     if ($comp) {
                            $component = $this->loadComponent($comp);
                            if ($component) {
                                   $this->loadContent('404', "page not found", [], []);
                            }
                     } else {
                            $this->loadContent('404', "page not found", [], []);
                     }
                     return;
              }

              foreach (ROUTES as $routes) {
                     foreach ($routes["routes"] as $route) {
                            if ($route === $URL) {
                                   $this->loadContent($routes["fileName"], $routes["title"], $routes["css"], $routes["js"], ($routes["isCustom"]) ?? false);
                                   return;
                            }
                     }
              }
              $this->loadContent('404', "page not found", [], []);
       }

       /**
        * load page content
        * @author : Madusha Pravinda
        * @param string $filename
        * @param string $title
        * @param array $cssFiles
        * @param array $JSFiles
        * @optional @param bool $isCustom
        */
       public function loadContent(string $fileName, string $title, array $cssFiles, array $JSFiles, bool $isCustom = false)
       {
              define("PAGE_TITLE", $title);
              define("JAVASCRIPT_FILES", $JSFiles);
              define("CSS_FILES", $cssFiles);
              define("IS_CUSTOM_HEADER", $isCustom);
              $this->loadHeader($isCustom);
              require_once $this->viewDir . $fileName . ".php";
              $this->loadFooter($isCustom);
       }


       /**
        * load a compoentn design content 
        *
        * @param string $component component name
        *
        */
       public function loadComponent($component)
       {
              try {
                     return file_get_contents(__DIR__ . "/../../public/view/component/custom/$component.comp.php");
              } catch (\Throwable $th) {
                     return null;
              }
       }

       // page header handling
       public function loadHeader()
       {
              require_once $this->componentDir . "header.php";
       }

       //page footer handling
       public function loadFooter()
       {
              require_once $this->componentDir . "footer.php";
       }
}
