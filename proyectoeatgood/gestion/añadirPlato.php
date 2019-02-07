<!DOCTYPE html>
<?php
require "protect.php";
require '../clases/persona.php';
require '../clases/bd.php';

$persona = new persona();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $persona->obtenerPorIdGestion($id);
}

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        //actualizar
        $persona->uppPlato($_POST, $_FILES);
    } else {
        //insertar
        $persona->creaObj($_POST, $_FILES);
    }
    header('location:editar.php');
}

?>
<html>
<head>
    <meta charset="UTF-8">

    <title></title>
    <?php
    include './includes/head.inc.php';
    ?>
</head>
<body>
<?php
include './includes/nav.inc.php';
?>
<form name="platos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <table class="mitabla">
        <input type="hidden" id="id" name="id" value="<?php echo $persona->getId(); ?>">
        <tr>
            <td>Nombre:</td>
            <td><input type="text" maxlength="50" name="nombre" id="nombre" value="<?php echo $persona->getNombre(); ?>"
                       placeholder="Nombre">
            </td>
        </tr>
        <tr>
            <td >Precio:</td>
            <td><input type="text" name="precio" value="<?php echo $persona->getPrecio(); ?>"
                       placeholder="Precio"></td>
        </tr>
        <tr>
            <td>Foto:</td>
            <td>
                <?php
                if ($persona->getFoto() != "") {
                    echo "<img src='../" . $persona->getFoto() . "' id='cajaFoto'>";
                    echo "<a href='javascript:borrarFoto(" . $persona->getId() . ")' id='btnFoto'>Borra Foto</a>";
                }
                ?>

            </td>

        </tr>
        <tr>
            <td><input type="file" name="foto"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Guardar"></td>
        </tr>

    </table>
</form>
</body>
</html>
