<?php
session_start();
include '../../controlador/conexion.php';
$consulta = mysqli_query($con, "select * from usuarios where Usuario='" . $_POST['Usuario'] . "' AND 
 					Password='" . $_POST['Password'] . "'") or die(mysqli_error($con));
while ($fila = mysqli_fetch_array($consulta)) {
    $datos[] = array('Nombre' => $fila['Nombre'],
        'Apellido' => $fila['Apellido'],
        'Usuario' => $fila['Usuario']);
}
if (isset($datos)) {
    $_SESSION['Usuario'] = $datos;
    if ($_SESSION['Usuario'][0]['Usuario'] == "admin") {
        header("Location: ../../vista/admin.php");
    } else {
        header("Location: ../../index.php");
    }


} else {
    header("Location: ../../vista/login.php?error=datos no validos");
}
?>