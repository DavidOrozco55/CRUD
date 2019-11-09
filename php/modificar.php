<?php

    include("bdConexion.php");

    
    $id = $_POST['id'];
    
    $tabla = $_POST['frm'];

    echo $id;

    $query = "";
    $nombreCampoID= "";

    switch($tabla){
        case "pelicula":
            $nombreCampoID = "id_pelicula";
            $titulo = $_POST['Tit'];
            $estudio = $_POST['Estudios'];
            $duracion = $_POST['Dur'];            
            $clasificacion = $_POST['Cla'];

            $queryEncontrarIdEstudio = "select id_estudio from estudio where nombre = '".$estudio."';";
            $idEstudio = $base->query($queryEncontrarIdEstudio)->fetchAll(PDO::FETCH_OBJ);

            foreach($idEstudio as $id_estudio){
                echo $idEstudio = $id_estudio->id_estudio;
            }

            $query = "UPDATE " .$tabla. " SET ID_ESTUDIO = " .$idEstudio. ", duracion = " . $duracion. ", clasificacion = '" . $clasificacion . "', nombre = '" . $titulo . "' WHERE " . $nombreCampoID . " = " . $id;

            break;
        
        case "disco":
            $nombreCampoID = "id_disco";
            $nombrePelicula = $_POST['Peliculas'];
            $queryEncontrarIdPelicula = "select id_pelicula from pelicula where nombre = '".$nombrePelicula."';";
            $idPelicula = $base->query($queryEncontrarIdPelicula)->fetchAll(PDO::FETCH_OBJ);

            foreach($idPelicula as $id_pelicula){
                echo $idPelicula = $id_pelicula->id_pelicula;
            }

            $query = "UPDATE " .$tabla. " SET ID_PELICULA = " .$idPelicula. " WHERE " . $nombreCampoID . " = " . $id;
            break;

        case "estudio":
            $nombreCampoID = "id_estudio";
            $nombreEstudio = $_POST['est'];
            $query = "UPDATE " .$tabla. " SET NOMBRE = '" .$nombreEstudio. "' WHERE " . $nombreCampoID . " = " . $id;
            break;
            
    }


    
    $base->query($query);

    header("Location: http://localhost/crud/" . $tabla . "s.php");


?>