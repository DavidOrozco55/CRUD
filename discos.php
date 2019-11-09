<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Discos</title>
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>

<body>

    <header>
        <nav> 
            <a href="index.html"><span>Inicio</span></a>
            <a href="discos.php"><span>Discos</span></a>
            <a href="estudios.php"><span>Estudios</span></a>
            <a href="peliculas.php"><span>Peliculas</span></a>
            <a href="inicioSesion.php"><span>Cerrar sesión</span></a>
        </nav>
    </header>

    <?php
        include("php/bdConexion.php");

        $registros_discos = $base->query("CALL VERDISCOS();")->fetchAll(PDO::FETCH_OBJ);
        $peliculas = $base->query("CALL VERPELICULAS();")->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div id="principal">

        <h1>Discos (HTML)</h1>
        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. de disco</td>
                <td class="primera_fila">Pelicula</td>  
                <td class="sin">&nbsp;</td>            
                <td class="sin">&nbsp;</td>
            </tr> 
            
            <?php
            
                foreach($registros_discos as $disco):
            
            ?>
                <form method = "post" action="php/editarDisco.php">
                
                    <tr>
                        <input type="hidden" name="frm" value="disco">
                        <td><?php echo $disco->id_disco?><input type="hidden" name="id" value="<?php echo $disco->id_disco?>"></td>
                        <td><?php echo $disco->Pelicula?><input type="hidden" name="Tit" value="<?php echo $disco->Pelicula?>"></td>
                        
                        <td class="bot">
                            <a href="php/borrar.php?id=<?php echo $disco->id_disco?>&t=disco">
                                <input type='button' name='del' id='del' value='Borrar'>
                            </a>
                        </td>
                        <td class='bot'>
                                <input type='submit' name='up' id='up' value='Actualizar'>
                        </td>
                    </tr>
                </form>
            <?php            
                endforeach;
            ?>

            <tr>
                <td></td>
                <form name="discos" method= "post" action="php/insertar.php">
                    <input type="hidden" name="frm" value="disco"/>
                    
                    <td>
                        <select width='10' name="Peliculas" required>
                            <?php
                            
                                foreach($peliculas as $pelicula):

                            ?>
                                    <option value="<?php echo $pelicula->Titulo?>"><?php echo $pelicula->Titulo?></option>

                            <?php endforeach?>
                        </select>
                    </td>
                

                    <td class='bot'>
                        <input type='submit' value="Insertar">
                    </td>
                </form>
            </tr>    
        </table>

        <p>&nbsp;</p>

        
        <a href="php/verDiscoXML.php">
            <button id="cambiarFormato" type="button">
            Ver en formato XML
            </button>
        </a>

    </div>

</body>
</html>