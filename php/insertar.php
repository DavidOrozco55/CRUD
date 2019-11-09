<?php

    include("bdConexion.php");        
    $tabla = $_POST['frm'];

    $query = "";

    switch($tabla){
        case "pelicula":
            $titulo = $_POST['Tit'];
            $estudio = $_POST['Estudios'];
            $duracion = $_POST['Dur'];
            $titulo = $_POST['Tit'];
            $clasificacion = $_POST['Cla'];

            if(strlen ($clasificacion) < 2 || ctype_alpha(str_replace(' ', '', $clasificacion))){
                $queryEncontrarIdEstudio = "select id_estudio from estudio where nombre = '".$estudio."';";
                $idEstudio = $base->query($queryEncontrarIdEstudio)->fetchAll(PDO::FETCH_OBJ);
    
                foreach($idEstudio as $id_estudio){
                    echo $idEstudio = $id_estudio->id_estudio;
                }
    
                $query = "INSERT INTO " .$tabla. " VALUES  (0, ".$idEstudio.",".$duracion.",'".$clasificacion."',sinopsis ,50,'".$titulo."','N');";
            }else{                        
                $query = "ERROR";
            }

            break;
        case "disco":
            $peliculas = $_POST['Peliculas'];

            $queryEncontrarIDPelicula = "select id_pelicula from pelicula where nombre = '".$peliculas."';";
            $idPelicula = $base->query($queryEncontrarIDPelicula)->fetchAll(PDO::FETCH_OBJ);

            foreach($idPelicula as $id_pelicula){
                echo $idPelicula = $id_pelicula->id_pelicula;
            }

            $query = "INSERT INTO " .$tabla. " VALUES (0, ".$idPelicula.", 'N', 'S');";
            break;

        case "estudio":
            $nombre_estudio = $_POST['est'];
            $query = "INSERT INTO " .$tabla. " VALUES (0, '".$nombre_estudio."', 'N');";
            break;
            
    }

    if($query == "ERROR"){
        header("Location: http://localhost/crud/" . $tabla . "s.php?error=1");

    }else{
        $base->query($query);
        header("Location: http://localhost/crud/" . $tabla . "s.php");
    }

   
?>