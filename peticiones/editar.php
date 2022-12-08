<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from peticiones where codigo = ?;");
    $sentencia->execute([$codigo]);
    $peticiones = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($peticiones);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $peticiones->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">documento: </label>
                        <input type="number" class="form-control" name="txtdocumento" autofocus required
                        value="<?php echo $peticiones->documento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">dependencia: </label>
                        <input type="text" class="form-control" name="txtdependencia" autofocus required
                        value="<?php echo $peticiones->dependencia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">maquina: </label>
                        <input type="text" class="form-control" name="txtmaquina" autofocus required
                        value="<?php echo $peticiones->maquina; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $peticiones->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>