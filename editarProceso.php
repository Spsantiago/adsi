<?phpedad
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $documento = $_POST['txtdocumento'];
    $email = $_POST['txtemail'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, documento = ?, email = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $documento, $email, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>