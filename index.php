<?php
//la variable localhost nos da la ubicacion en la maquina donde esta la base de datos
$host="localhost";
// db es el nombre de la base de datos
$db="tiendita";
//Aca es donde guardo la informacion del usuario
$user="root";
// Aca es donde guardo la informacion del la clave.
$pass="";
/
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
}
//aca si registrado es verdadero sale un mensaje de Registrado Exitosamente
if ($registrado == TRUE){
    echo "Registrado Exitosamente";
    
}
//y si no es correcto saldria Usiario no valido.
else {
    echo "Usuario no valido";
}