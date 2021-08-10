<?php

    class NuevoModel extends Model{

        public function __construct(){

            parent::__construct();

        }
        public function insert(){
            //insertar el la BD
            echo "Insertar datos";
        }
    }

?>