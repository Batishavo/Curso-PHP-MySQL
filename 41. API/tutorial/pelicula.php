<?php 

include_once 'db.php';
class Pelicula extends DB{
    function obtenerPeliculas(){
        $query=$this->connect()->query('select * from prlicula');
        
        return $query;
    }
}
?>