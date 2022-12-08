<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtdocumento"]) || empty($_POST["txtemail"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $documento = $_POST["txtdocumento"];
    $email = $_POST["txtemail"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,documento,email) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$documento,$email]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>