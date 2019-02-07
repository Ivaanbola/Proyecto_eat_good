<?php
require_once '../clases/Persona.php';
require_once '../clases/bd.php';


if (isset($_POST) && !empty($_POST)) {
    if (persona::login($_POST)) {
        header("location:editar.php");
    } else {
        echo '<script> alert("Contraseña incorrecta")</script>';
    }
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
    include './includes/head.inc.php';
    ?>
</head>
<body>
<div class="contenedorGestion">
    <?php
    include 'includes/nav.inc.php';
    ?>
    <div class="paginaLogin">
        <form name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">

                <label for="exampleInputEmail1">User </label>
                <small class="form-text text-muted">Inserta tu usuario.</small>
                <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" name="usuario"
                       placeholder="Write your user">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Enter</button>
        </form>
    </div>
</div>
</body>
</html>
