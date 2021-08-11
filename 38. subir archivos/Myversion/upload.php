<?php 
    //echo var_dump($_FILES["file"]);
    $directorio="uploads/";

    $archivo = $directorio . basename($_FILES["file"]["name"]);
    //sE OBTIENE EL TIPO DE ARCHIVO
    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    
    //Tamaño de imagenes
    $checarSiImagen=getimagesize($_FILES["file"]["tmp_name"]);
    //validar que es imagenes
    //var_dump($size);
    //echo $tipoArchivo;
    if($checarSiImagen!=false){
        //validando tamaño del archivo
        $size=$_FILES["file"]["size"];

        if($tipoArchivo=="jpg" || $tipoArchivo=="jpeg"){
            //Se valido el archivo correctamente
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$archivo)){
                echo "El archivo se subio correctamente";
            }
            else{
                echo "Hubo un error en la subida del archivo";
            }
        }
        else{
            echo "solo se admiten Archivos jpg/jpeg";
        }
        
    }
    else{
        echo "El documento no es una imagen";
    }
?>