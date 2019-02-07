<?php
//Controladora
require_once "./clases/persona.php";
require_once "./clases/bd.php";


//
$trabajado = new Persona();

if (isset($_POST) && !empty($_POST)) {
    $trabajado->obtenerPersona($_POST, $_FILES);
    header('location:pedidos.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        EAT GOOD
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/css.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>


<div class="contenedor">

    <header>

        <div></div>


    </header>

    <?php
    include 'includes/nav.inc.php';
    ?>

    <section>
        <form name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
              method="post" enctype="multipart/form-data">
            <div>
                <div>
                    <label for="nombre">Nombre:</label>
                    <div>
                        <input type="text" id="nombre" name="nombre"
                               value="<?php echo $trabajado->getNombre() ?>">
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <label for="apellidos">Primer apellido:</label>
                    <div>
                        <input type="text" id="apellidos" name="apellidos"
                               value="<?php echo $trabajado->getApellidos() ?>">
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <label for="direccion">Dirección:</label>
                    <div>
                        <input type="text" id="direccion" name="direccion"
                               value="<?php echo $trabajado->getDireccion() ?>">
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <label for="comunidad">Comunidad:</label>
                    <div>
                        <input type="text" id="comunidad" name="comunidad"
                               value="<?php echo $trabajado->getComunidad() ?>">
                    </div>
                </div>
            </div>

            <div>
                <label for="telefono">Teléfono:</label>
                <div>
                    <input type="text" id="telefono"
                           name="telefono" value="<?php echo $trabajado->getTel() ?>">
                </div>
            </div>

            <div>
                <div>
                    <label for="mail">E-mail:</label>
                    <div>
                        <input type="email" id="mail" name="mail"
                               value="<?php echo $trabajado->getMail() ?>">
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <label for="clave">Prueba de robot :</label>
                    <div><img src="img/captcha.png" width="120" height="80"></div>
                    <div>
                        <input type="text" id="clave" name="clave"
                               value="<?php echo $trabajado->getContraseña() ?>">
                    </div>
                </div>
            </div>


            <input class="button" type="submit" value="Enviar Formulario">

            <div style="position:absolute; left:329px; top:180px;"><label for="comida">Pedido:</label></div>


            <div style="position:absolute; left:429px; top:160px;"><img src="img/platos/acabados/plato1.png"></div>
            <div style="position:absolute; left:628px; top:170px;"><input type="checkbox" name="id" value="1">
            </div>


            <div style="position:absolute; left:680px; top:160px;"><img src="img/platos/acabados/plato2.png"></div>
            <div style="position:absolute; left:879px; top:170px;"><input type="checkbox" name="id" value="2">
            </div>


            <div style="position:absolute; left:930px; top:160px;"><img src="img/platos/acabados/plato3.png"></div>
            <div style="position:absolute; left:1129px; top:170px;"><input type="checkbox" name="id" value="3">
            </div>


            <div style="position:absolute; left:429px; top:400px;"><img src="img/platos/acabados/plato4.png"></div>
            <div style="position:absolute; left:629px; top:410px;"><input type="checkbox" name="id" value="4">
            </div>


            <div style="position:absolute; left:680px; top:400px;"><img src="img/platos/acabados/plato5.png"></div>
            <div style="position:absolute; left:879px; top:410px;"><input type="checkbox" name="id" value="5">
            </div>


            <div style="position:absolute; left:930px; top:400px;"><img src="img/platos/acabados/plato6.png"></div>
            <div style="position:absolute; left:1129px; top:410px;"><input type="checkbox" name="id" value="6">
            </div>


            <div style="position:absolute; left:680px; top:640px;"><img src="img/platos/acabados/postre2.png"></div>
            <div style="position:absolute; left:879px; top:650px;"> <input type="checkbox" name="id" value="7">
            </div>


            <div style="position:absolute; left:429px; top:640px;"><img src="img/platos/acabados/postre3.png"></div>
            <div style="position:absolute; left:629px; top:650px;"><input type="checkbox" name="id" value="8">
            </div>

            <div style="position:absolute; left:930px; top:640px;"><img src="img/platos/acabados/postre4.png"></div>
            <div style="position:absolute; left:1129px; top:650px;"><input type="checkbox" name="id" value="9">
            </div>


            <div style="position:absolute; left:1240px; top:300px;"><img height="225px" width="225px"
                                                                         src="img/platos/acabados/refresco.png"></div>
            <div style="position:absolute; left:1439px; top:310px;"><input type="checkbox" name="id" value="10">
            </div>


            <div style="position:absolute; left:1240px; top:570px;"><img height="225px" width="225px"
                src="img/platos/acabados/cerveza.jpg">
            </div>
            <div style="position:absolute; left:1439px; top:580px;"><input type="checkbox" name="id" value="11">
            </div>

        </form>


    </section>

    <aside></aside>
    <?php
    include 'includes/footer.inc.php';
    ?>

</div>

</body>
</html>