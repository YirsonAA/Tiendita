<?php
session_start();
//Si no existe la sesion del usuario no existe regresamos al login
if(isset($_SESSION["user"])==false){
    //Redireccionamos hacia dashboard
    header("Location: login.php");
    //Matamos esto para evitar que se ejecute lo de mas abajo
    die();
}
//Si se recibe la variable de carrar sesion cerramos la sesion y redireccionamos al login
if(isset($_GET["cerrar"])==true){
    //Destruimos la sesion para borrar la sesion del usuario
    session_destroy();
    //Redireccionamos hacia login
    header("Location: login.php");
    //Matamos esto para evitar que se ejecute lo de mas abajo
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form action="dashboard.php" method="get">
        <div style="text-align: center;">
            Hola <?php echo $_SESSION["user"] ?>
        </div>
        <div style="text-align: center;">
            Tu correo <?php echo $_SESSION["email"] ?>
        </div>
        <div style="text-align: center;">
            <input type="submit" name="cerrar" value="Cerrar sesión">
        </div>
    </form>
</body>
</html>
