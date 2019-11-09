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
                <a href="../inicioSesion.php"><span>Cerrar sesión</span></a>
        </nav>
    </header>

    <div id="principal">
        <?php
            include("bdConexion.php");

            $registros = $base->query("CALL VERDISCOS()")->fetchAll(PDO::FETCH_OBJ);

            $domDocument = new domdocument("1.0");
            $raiz = new domelement("discosBD");
            $raiz = $domDocument->appendChild($raiz);
            foreach ($registros as $disco){
                $discoXML = new domelement("disco");
                $discoXML = $raiz->appendChild($discoXML);
                $id_disco = new DOMElement("id_disco",$disco->id_disco);
                $id_disco = $discoXML->appendChild($id_disco);
                $pelicula = new DOMElement("pelicula",$disco->Pelicula);
                $pelicula = $discoXML->appendChild($pelicula);
            }
        
            $domDocument->save("discos.xml");

            $arch_xml = "discos.xml";
            $arch_xsl = "../discosXSL.xsl";
        
            $doc = new DOMDocument();
            $xsl = new XSLTProcessor();
        
            $doc->load($arch_xsl);
            $xsl->importStyleSheet($doc);
        
            $doc->load($arch_xml);
            echo $xsl->transformToXML($doc);
    
        ?>
    
    
    </div>
</body>
</html>




