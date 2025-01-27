<?php 
    include_once 'pelicula.php'
    class ApiPelicula{
        function getAll(){
            $pelicula = new Pelicula();
            $peliculas=array();
            $peliculas["items"]=array();

            $res=$pelicula->obtenerPeliculas();
            if($res->rowCount()){
                while($row=$res->fetch(PDO::FETCH_ASSC)){
                    $item=array(
                        'id'=> $row['id'],
                        'nombre'=>$row['nombre'],
                        'imagen'=>$row['imagen']
                    );
                    array_push($peliculas['items'],$item);
                }
                echo json_encode($peliculas);
            }else{
                echo json_encode(array('mensaje'=>'no hay elementos'));
            }
        }
    }
?>