<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $documento = $_POST['txtdocumento'];
    $dependencia = $_POST['txtdependencia'];
    $maquina = $_POST['txtmaquina'];

    $sentencia = $bd->prepare("UPDATE peticiones SET nombre = ?, documento = ?, dependencia = ?, maquina = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $documento, $dependencia, $maquina, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>