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

        $registros_estudios = $base->query("CALL VERESTUDIOS();")->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div id="principal">

        <h1>Estudios (HTML)</h1>
        <table width="50%" border="0" align="center">
            <tr >
                <td class="primera_fila">No. de estudio</td>
                <td class="primera_fila">Nombre estudio</td>  
                <td class="sin">&nbsp;</td>            
                <td class="sin">&nbsp;</td>
            </tr> 
            
            <?php
            
                foreach($registros_estudios as $estudio):
            
            ?>
                <form method = "post" action="php/editarEstudio.php">
                
                    <tr>
                        <input type="hidden" name="frm" value="estudio">
                        <td><?php echo $estudio->ID_ESTUDIO?><input type="hidden" name="id" value="<?php echo $estudio->ID_ESTUDIO?>"></td>
                        <td><?php echo $estudio->ESTUDIO?><input type="hidden" name="est" value="<?php echo $estudio->ESTUDIO?>"></td>
                        

                        <td class="bot">
                            <a href="php/borrar.php?id=<?php echo $estudio->ID_ESTUDIO?>&t=estudio">
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
                    <input type="hidden" name="frm" value="estudio"/>
                    
                    <td>
                        <input type="text" name="est" class="centrado" required />
                    </td>
                

                    <td class='bot'>
                        <input type='submit' value="Insertar">
                    </td>
                </form>
            </tr>    
        </table>

        <p>&nbsp;</p>

        
        <a href="php/verEstudiosJSON.php">
            <button id="cambiarFormato" type="button">
            Ver en formato JSON
            </button>
        </a>

    </div>

</body>
</html>