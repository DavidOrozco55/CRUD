<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PELICULAS</title>
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

        $registros = $base->query("CALL VERPELICULAS();")->fetchAll(PDO::FETCH_OBJ);
        $registrosEstudios = $base->query("select *from estudio where eliminado = 'N';")->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div id="principal">

        <h1>Peliculas</h1>

        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. pelicula</td>
                <td class="primera_fila">Titulo</td>
                <td class="primera_fila">Estudio</td>
                <td class="primera_fila">Duracion (min)</td>
                <td class="primera_fila">Clasificacion</td>

                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr> 
            
            <?php
            
                foreach($registros as $pelicula):
            
            ?>
                <form method = "post" action="php/editarPelicula.php">
                
                    <tr>
                        <input type="hidden" name="frm" value="pelicula">
                        <td><?php echo $pelicula->ID_PELICULA?><input type="hidden" name="id" value="<?php echo $pelicula->ID_PELICULA?>"></td>
                        <td><?php echo $pelicula->Titulo?><input type="hidden" name="Tit" value="<?php echo $pelicula->Titulo?>"></td>
                        <td><?php echo $pelicula->Estudio?><input type="hidden" name="Estudios" value="<?php echo $pelicula->Estudio?>"></td>
                        <td><?php echo $pelicula->Duracion?><input type="hidden" name="Dur" value="<?php echo $pelicula->Duracion?>"></td>
                        <td><?php echo $pelicula->Clasificacion?><input type="hidden" name="Cla" value="<?php echo $pelicula->Clasificacion?>"></td>

                        <td class="bot">
                            <a href="php/borrar.php?id=<?php echo $pelicula->ID_PELICULA?>&t=pelicula">
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
                <form name="peliculas" method= "post" action="php/insertar.php">
                    <input type="hidden" name="frm" value="pelicula"/>
                    <td><input type='text' name='Tit' size='10' class='centrado' required></td>
                    <td>
                        <select width='10' name="Estudios" required>
                            <?php
                            
                                foreach($registrosEstudios as $estudio):
                            ?>
                                    <option value="<?php echo $estudio->NOMBRE?>"><?php echo $estudio->NOMBRE?></option>

                            <?php endforeach?>
                        </select>
                    </td>
                    <td><input type='number' min= '1' max= "180" name='Dur' size='10' class='centrado' required></td>
                    <td><input type='text' name='Cla' size='10' class='centrado' required></td>

                    <td class='bot'>
                        <input type='submit' value="Insertar">
                    </td>
                </form>
            </tr>    
        </table>

        <p>&nbsp;</p>

    </div>

    <?php
        if(isset($_GET['error'])){
            $errorCode = $_GET['error'];
            if($errorCode == 1){             
                echo "<script type='text/javascript'>alert('La clasificación solo puede contener máximo dos caracteres y estos no pueden ser números o caracteres especiales');</script>";
            }
        }
    ?>
</body>
</html>