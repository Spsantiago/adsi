<?php
    print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtdocumento"]) || empty($_POST["txtdependecia"]) || empty($_POST["txtmaquina"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtnombre"];
    $documento = $_POST["txtdocumento"];
    $dependecia = $_POST["txtdependecia"];
    $maquina = $_POST["txtmaquina"];
    
    $sentencia = $bd->prepare("INSERT INTO peticiones(nombre,documento,dependencia,maquina) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre,$documento,$dependecia,$maquina]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>