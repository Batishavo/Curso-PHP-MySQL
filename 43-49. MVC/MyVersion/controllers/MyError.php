<?php
     class MyError extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="Erro al cargar el recurso";
            $this->view->render('error/index');
            //echo "<p>Error al cargar recurso</p>";
        }

    }

?>