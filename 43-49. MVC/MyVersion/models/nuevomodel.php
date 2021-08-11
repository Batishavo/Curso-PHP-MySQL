<?php

    class NuevoModel extends Model{

        public function __construct(){

            parent::__construct();

        }
        public function insert($datos){
            //insertar el la BD
            $query=$this->db->connect()->prepare('insert INTO ALUMNOS(Matricula,Nombre,Apellido) values(:Matricula,:Nombre,:Apellido)');
            $query->execute(['matricula' => $datos['matricula'], 'nombre' => $datos['nombre'], 'apellido'=>$datos['apellido']]);
            echo "Insertar datos";
        }
    }

?>