<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar estudio</title>
    <link rel="stylesheet" type="text/css" href="../css/tablas.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>

<body>
    <div id="principal">

        <?php
            include("bdConexion.php");

            $registros = $base->query("CALL VERESTUDIOS();")->fetchAll(PDO::FETCH_OBJ);
        
            $id = $_POST['id'];                    
            $nombre_estudio = $_POST['est'];                                
        ?>

        <h1>Editar el estudio: </h1>

        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. de estudio</td>
                <td class="primera_fila">Nombre estudio</td>

                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr> 
                
            <tr>
                <form name="peliculas" method= "post" action="modificar.php">
                    <td><?php echo $id?><input type='hidden' name='id' size='10' value="<?php echo $id?>"></td>
                    <input type="hidden" name="frm" value="estudio"/>
                    
                    <td><input type='text' name='est' size='20' value = "<?php echo $nombre_estudio?>"></td>                
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