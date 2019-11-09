<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Discos -> XML</title>
    <link rel="stylesheet" type="text/css" href="../css/tablas.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>
<body>
    <header>
        <nav> 
                <a href="../index.html"><span>Inicio</span></a>
                <a href="../discos.php"><span>Discos</span></a>
                <a href="../estudios.php"><span>Estudios</span></a>
                <a href="../peliculas.php"><span>Peliculas</span></a>
        </nav>
    </header>

    <div id="principal">
        <h1>Estudios (JSON)</h1>
        <?php

            require("bdConexion.php");
            $registros_estudios = $base->query("CALL VERESTUDIOS()")->fetchAll(PDO::FETCH_OBJ);

            $estudios = array();
            $response = array();


            foreach($registros_estudios as $estudio){
                $estudios[] = array('ID_ESTUDIO'=>$estudio->ID_ESTUDIO, 'ESTUDIO'=> $estudio->ESTUDIO);    
            }

            $response['estudios'] = $estudios;
            $fp = fopen('estudios.json', 'w');
            fwrite($fp, json_encode($response));
            fclose($fp);

            $str = file_get_contents('estudios.json');
            echo json_encode (json_decode($str, true));
        ?>     
    </div>
</body>
</html>









