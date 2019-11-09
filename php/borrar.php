
<?php
    include("bdConexion.php");

    $id= $_GET["id"];
    $tabla = $_GET["t"];

    $nombreCampo = "";
    echo $tabla;
    switch($tabla){
        case "pelicula":     $nombreCampo = "id_pelicula";  break;
        case "disco":        $nombreCampo = "id_disco";     break;
        case "estudio":      $nombreCampo = "id_estudio";   break;
    }

    $base->query("UPDATE " .$tabla. " SET ELIMINADO = 'S' WHERE ".$nombreCampo. " = " . $id . ";");

    header("Location: http://localhost/crud/" . $tabla . "s.php");

?>