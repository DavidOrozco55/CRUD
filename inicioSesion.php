<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>



    <div id="principal">
        <h1>Inicio de sesión</h1>       
        <div class="login">
            <form action="php/iniciarSesion.php" method="POST">            
                <p>Usuario</p>
                <input type="text" name="usr" required>
                <p>Contraseña</p>
                <input type="password" name="pass" required>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
    </div>
    <?php
    
        if(isset($_GET['error'])){
            echo "<script type='text/javascript'>alert('Usuario o contraseña incorrectos, vuelve a intentarlo!');</script>";
        }

    ?>
</body>
</html>