<?php
    
    class Consulta extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->render('consulta/index');
            //echo "<p>Nuevo controlador Main</p>";
        }
        function saludo(){
            //echo "<p>Ejecuta el método saludo</p>";
        }
    }
   
?>