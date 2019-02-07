<?php
require "protect.php";

require_once '../clases/persona.php';
require_once '../clases/bd.php';
$lista = new listaPersonas();
$lista->obtenerMenu();
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
<div class="contenedor">
    <?php
    include 'includes/nav.inc.php';
    ?>
    <div class="lista">

        <?php
        echo $lista->imprimirListaGestion();

        ?>
    </div>

</body>
</html>
