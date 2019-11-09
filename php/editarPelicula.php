<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar pelicula</title>
    <link rel="stylesheet" type="text/css" href="../css/tablas.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>

<body>
    <div id="principal">

        <?php
            include("bdConexion.php");

            $registros = $base->query("CALL VERPELICULAS();")->fetchAll(PDO::FETCH_OBJ);
            $registrosEstudios = $base->query("select *from estudio where eliminado = 'N';")->fetchAll(PDO::FETCH_OBJ);
        
            $id = $_POST['id'];                       
        
            
            $titulo = $_POST['Tit'];
            $estudio = $_POST['Estudios'];
            $duracion = $_POST['Dur'];            
            $clasificacion = $_POST['Cla'];                            
            
            $queryEncontrarIdEstudio = "select id_estudio from estudio where nombre = '".$estudio."';";
            $idEstudio = $base->query($queryEncontrarIdEstudio)->fetchAll(PDO::FETCH_OBJ);
            
            $query = "";
        ?>

        <h1>Editar la película: </h1>

        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. pelicula</td>
                <td class="primera_fila">Titulo</td>
                <td class="primera_fila">Estudio</td>
                <td class="primera_fila">Duracion</td>
                <td class="primera_fila">Clasificacion</td>

                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr> 
                
            <tr>
                <form name="peliculas" method= "post" action="modificar.php">
                    <td><?php echo $id?><input type='hidden' name='id' size='10' value="<?php echo $id?>"></td>
                    <input type="hidden" name="frm" value="pelicula"/>
                    
                    <td><input type='text' name='Tit' size='10' value="<?php echo $titulo?>"></td>
                    <td>
                        <select width='10' name="Estudios">
                                <?php
                                
                                    foreach($registrosEstudios as $estudio):

                                ?>
                                        <option value="<?php echo $estudio->NOMBRE?>"><?php echo $estudio->NOMBRE?></option>

                            <?php endforeach?>
                        </select>
                    </td>
                    <td><input type='text' name='Dur' size='10' value="<?php echo $duracion?>"></td>
                    <td><input type='text' name='Cla' size='10' value="<?php echo $clasificacion?>"></td>

                    <td class='bot'>
                        <input type='submit' value="Actualizar" onclick="<?php echo "hola" ?>">
                    </td>
                </form>
            </tr>    
        </table>

        <p>&nbsp;</p>

    </div>

</body>
</html>