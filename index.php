<?php
//Se inicia la sesion en php para guradar si el usuario ya esta logueado o no
session_start();
//Validamos si el usuario ya inicio su sesion lo redireccionamos hacia el dashboard para mostrar su usuario y email
if(isset($_SESSION["user"])==true){
    //Redireccionamos hacia dashboard
    header("Location: dashboard.php");
    //Matamos esto para evitar que se ejecute lo de mas abajo
    die();
}
//la variable localhost nos da la ubicacion en la maquina donde esta la base de datos
$host="localhost";
// db es el nombre de la base de datos
$db="tiendita";
//Aca es donde guardo la informacion del usuario
$user="root";
// Aca es donde guardo la informacion del la clave.
$pass="";
//conn es donde tengo la conexion.
$conn = new mysqli($host,$user ,$pass , $db);
//Si se ingresa una clave incorrectano habria coneccion por lo cual nos daria un mensaje con Error de conexion
if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
} 
//Si la clave es correcta aparece un mensaje de coneccion correcta
echo 'Conectado a la base de datos.<br>';
//aca hacemos la busqueda de la base de datos pero colocamos el usuario y contraseña que vienen desde el formulario.
$result = $conn->query("SELECT * FROM `usuario` WHERE `user` = '".$_POST['user']."' AND `pass` = '".$_POST['pass']."'");
//Por defaulf hicmos la variable registrado FALSO para despues convertilo a verdadero ingresando el usuario correcto y la clave correcta
$registrado = FALSE;
//mediante foreach hago un ciclo, que se cicla si hay dato
foreach ($result as $row) {
//Si llego a entrar el ciclo registrado va ser verdadero
    $registrado = TRUE;
    //Guardamos el ususario y el email en la sesion para validar que ya se registro
    $_SESSION["user"] = $row["user"];
    $_SESSION["email"] = $row["email"];
    //Detenemos el ciclo foreach
    break;
}
//aca si registrado es verdadero sale un mensaje de Registrado Exitosamente
if ($registrado == TRUE){
    echo "Registrado Exitosamente";
    //Redireccionamos hacia dashboard
    header("Location: dashboard.php");
}
//y si no es correcto saldria Usiario no valido.
else {
    echo "Usuario no valido";
    //Redireccionamos hacia dashboard
    header("Location: usuario-no-valido.php");
}