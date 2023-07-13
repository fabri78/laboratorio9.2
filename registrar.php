<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtDestino"]) || empty($_POST["txtDNI"]) || empty($_POST["txtNombres"]) || empty($_POST["txtFecha"]) || empty($_POST["txtOrigen"]) || empty($_POST["txttelefono"]) || empty($_POST["txtVuelo"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$destino = $_POST["txtDestino"];
$dni = $_POST["txtDNI"];
$Fecha = $_POST["txtNombres"];
$Nombres = $_POST["txtFecha"];
$origen = $_POST["txtOrigen"];
$telefono = $_POST["txttelefono"];
$Tipo_carga = $_POST["txtVuelo"];

$sentencia = $bd->prepare("INSERT INTO persona(Destino,DNI,Nombres,Fecha,Origen,Telefono,Vuelo) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$Destino, $DNI, $Nombres, $Fecha, $Origen, $telefono, $Vuelo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
