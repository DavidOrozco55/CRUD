<?php

    include("bdConexion.php");


    $usr = $_POST['usr'];
    $pass = $_POST['pass'];

    $queryInicioSesion = "select *from usuario where NOMBRE = '".$usr."' and CONTRA = '".$pass."';";
    $registroUsuario = $base->query($queryInicioSesion)->fetchAll(PDO::FETCH_OBJ);

    if($registroUsuario != null){
        header("Location: http://localhost/crud/index.html");
    }
    else{
        header("Location: http://localhost/crud/iniciosesion.php?error=1");
    }
    
    






?>