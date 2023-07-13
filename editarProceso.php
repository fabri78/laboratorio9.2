<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $destino = $_POST['txtdestino'];
    $DNI = $_POST['txtDNI'];
    $fecha = $_POST['txtfecha'];
    $nombres = $_POST['txtnombres'];
    $destino = $_POST['txtdestino'];
    $telefono = $_POST['txttelefono'];
    $tipo_de_carga = $_POST['txtVuelo'];

    $sentencia = $bd->prepare("UPDATE persona SET destino = ?, DNI = ?, fecha = ?, nombres = ?, origen = ?, telefono = ?, Vuelo = ?, where id = ?;");
    $resultado = $sentencia->execute([$destino, $DNI, $fecha, $nombres, $origen, $telefono, $Vuelo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
