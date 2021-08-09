<?php

include_once 'db.php';

class Peliculas extends DB{

    private $paginaActual;
    private $totalPaginas;
    private $nResultados;
    private $resultadosPorPagina;
    private $indice;
    private $error = false;
    function __construct($nPorPagina){

        parent::__construct();
        $this->resultadosPorPagina=$nPorPagina;
        $this->indice=0;
        $this->paginaActual= 1;

        $this->calcularPaginas();
    }

    function calcularPaginas(){
        $query = $this->connect()->query('select count(*) as total from pelicula');
        $this->nResultados=$query->fetch(PDO::FETCH_OBJ)->total;
        $this->totalPaginas=$this->nResultados/$this->resultadosPorPagina;
        
        if(isset($_GET['pagina'])){
            //VAlidar que pagina sea un numero y masyor o igual a 1 y menor o igual a totalPaginas
            if(is_numeric($_GET['pagina'])){
                if($_GET['pagina']>=1 && $_GET['pagina']<=$this->totalPaginas){
                    $this->paginaActual=$_GET['pagina'];
                    $this->indice=($this->paginaActual-1)*($this->resultadosPorPagina);
                }
                else{
                    echo "Pagina no existe";
                    $this->error=true;
                }
            }
            else{
                //confirmar erros
                echo "Error al mostrar la pagina";
                $this->error=true;
         }
            
        }
    }
    function mostrarPeliculas(){
        if(!$this->error){
            //continuar
            $query=$this->connect()->prepare('SELECT * from pelicula LIMIT :pos, :n');
            $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);
            foreach ($query as $pelicula){
                include 'vista-pelicula.php';
            }
        }
        else{
            echo "error";
        }

    }
    function mostrarPaginas(){
        $actual='';
        echo "<ul>";
        for($i=0;$i<$this->totalPaginas; $i++){
            if(($i+1)==$this->paginaActual){
                $actual=' class="actual"';
            }
            else{
                $actual=' class=';
            }
            echo '<li><a '.$actual.' href="?pagina='.($i+1).'">'.($i+1).'</a></li>';          
        }

        echo "</ul>";

    }

}

?>