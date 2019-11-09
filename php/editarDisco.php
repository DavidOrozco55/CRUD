<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar disco</title>
    <link rel="stylesheet" type="text/css" href="../css/tablas.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>

<body>
    <div id="principal">

        <?php
            include("bdConexion.php");

            $registros = $base->query("CALL VERPELICULAS();")->fetchAll(PDO::FETCH_OBJ);
        
            $id = $_POST['id'];                    
            $titulo = $_POST['Tit'];                                
            
            $query = "";
        ?>

        <h1>Editar el disco: </h1>

        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. de disco</td>
                <td class="primera_fila">Pelicula</td>

                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr> 
                
            <tr>
                <form name="peliculas" method= "post" action="modificar.php">
                    <td><?php echo $id?><input type='hidden' name='id' size='10' value="<?php echo $id?>"></td>
                    <input type="hidden" name="frm" value="disco"/>
                    
                    <td>
                        <select width='10' name="Peliculas">
                                <?php
                                
                                    foreach($registros as $pelicula):

                                ?>
                                        <option value="<?php echo $pelicula->Titulo?>"><?php echo $pelicula->Titulo?></option>

                            <?php endforeach?>
                        </select>
                    </td>
                

                    <td class='bot'>
                        <input type='submit' value="Actualizar">
                    </td>
                </form>
            </tr>    
        </table>

        <p>&nbsp;</p>

    </div>

</body>
</html>