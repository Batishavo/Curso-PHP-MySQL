<?php
   require_once 'controllers/MyError.php';
   
   class App{

      function __construct(){
         // echo "<p>Nueva app</p>";

         $url = isset($_GET['url']) ? $_GET['url']: null;         
         $url=explode('/', $url);

         if(empty($url[0])){
            $archivoController='controllers/main.php';
            require_once $archivoController;
            $controller= new Main();
            $controller->loadModel($url[0]);

            return false;
         }
         $archivoController='controllers/'.$url[0].'.php';
         if(file_exists($archivoController)){
            require_once $archivoController;
            $controller=new $url[0];
            $controller->loadModel($url[0]);
            if(isset($url[1])){
               $controller->{$url[1]}(); 
            }
         }
         else{
            $controller= new MyError();
         }
      
         
         
      }
   }
?>