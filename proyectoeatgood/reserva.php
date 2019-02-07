<?php
//Controladora
require_once "./clases/personas1.php";
require_once "./clases/bd.php";


//
$trabajado = new personas1();


if (isset($_GET['id']) && !empty($_GET['id'])) {


    $id = intval($_GET['id']);


    $trabajado->obtenerPorId($id);
}
if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        //actualizar
        $trabajado->upPersona($_POST, $_FILES);
    } else {
        //insertar
        $trabajado->obtenerPersona($_POST, $_FILES);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="estilos/css.css" rel="stylesheet" type="text/css"/>
        <title>
            EAT GOOD
        </title>
        <script type="text/javascript">
            function cambio1() {
                document.getElementById('verde1').src = 'img/puntorojo.png'
            }
            function cambio2() {
                document.getElementById('verde2').src = 'img/puntorojo.png'

            }
            function cambio3() {
                document.getElementById('verde3').src = 'img/puntorojo.png'

            }
            function cambio4() {
                document.getElementById('verde4').src = 'img/puntorojo.png'

            }
            function cambio5() {
                document.getElementById('verde5').src = 'img/puntorojo.png'

            }
            function cambio6() {
                document.getElementById('verde6').src = 'img/puntorojo.png'

            }
            function cambio7() {
                document.getElementById('verde7').src = 'img/puntorojo.png'

            }
            function cambio8() {
                document.getElementById('verde8').src = 'img/puntorojo.png'

            }
            function cambio9() {
                document.getElementById('verde9').src = 'img/puntorojo.png'

            }
            function mostrar1() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto1').style.display = 'block';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar2() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto2').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar3() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto3').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar4() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto4').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar5() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto5').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar6() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto6').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar7() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto7').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar8() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto8').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function mostrar9() {
                document.getElementById('ocultoreserv').style.display = 'none';
                document.getElementById('oculto9').style.display = 'block';
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
            }
            function ocultar() {
                document.getElementById('oculto1').style.display = 'none';
                document.getElementById('oculto2').style.display = 'none';
                document.getElementById('oculto3').style.display = 'none';
                document.getElementById('oculto4').style.display = 'none';
                document.getElementById('oculto5').style.display = 'none';
                document.getElementById('oculto6').style.display = 'none';
                document.getElementById('oculto7').style.display = 'none';
                document.getElementById('oculto8').style.display = 'none';
                document.getElementById('oculto9').style.display = 'none';
                document.getElementById('oculta10').style.display = 'none';
                document.getElementById('ocultoreserv').style.display = 'block';

            }
        </script>



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

                <table>
                    <tr>
                        <td><img src="img/plano.png" height="400" width="800"></td>

                    <div style="position:absolute; left:429px; top:450px;" value="Mostrar" onclick="mostrar1()"><img onMouseOut="document.getElementById('verde1').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde1').src = 'img/puntorojo.png'" id="verde1" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:374px; top:450px;" value="Mostrar" onclick="mostrar2()"><img onMouseOut="document.getElementById('verde2').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde2').src = 'img/puntorojo.png'" id="verde2" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:319px; top:450px;" value="Mostrar" onclick="mostrar3()"><img onMouseOut="document.getElementById('verde3').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde3').src = 'img/puntorojo.png'" id="verde3" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:264px; top:450px;" value="Mostrar" onclick="mostrar4()"><img onMouseOut="document.getElementById('verde4').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde4').src = 'img/puntorojo.png'" id="verde4" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:209px; top:450px;" value="Mostrar" onclick="mostrar5()"><img onMouseOut="document.getElementById('verde5').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde5').src = 'img/puntorojo.png'" id="verde5" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:154px; top:450px;" value="Mostrar" onclick="ocultar()"><img id="rojo" src="img/puntorojo.png" height="20" width="15"></div>
                    <div style="position:absolute; left:99px; top:450px;" value="Mostrar" onclick="ocultar()"><img id="rojo" src="img/puntorojo.png" height="20" width="15"></div>
                    <div style="position:absolute; left:423px; top:358px;" value="Mostrar" onclick="mostrar6()"><img onMouseOut="document.getElementById('verde6').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde6').src = 'img/puntorojo.png'" id="verde6" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:469px; top:358px;" value="Mostrar" onclick="mostrar7()"><img onMouseOut="document.getElementById('verde7').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde7').src = 'img/puntorojo.png'" id="verde7" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:171px; top:268px;" value="Mostrar" onclick="ocultar()"><img id="rojo" src="img/puntorojo.png" height="20" width="15"></div>
                    <div style="position:absolute; left:120px; top:268px;" value="Mostrar" onclick="mostrar8()"><img onMouseOut="document.getElementById('verde8').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde8').src = 'img/puntorojo.png'" id="verde8" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:71px; top:268px;" value="Mostrar" onclick="mostrar9()"><img onMouseOut="document.getElementById('verde9').src = 'img/puntoverde.png'" onMouseOver="document.getElementById('verde9').src = 'img/puntorojo.png'" id="verde9" src="img/puntoverde.png" height="20" width="15"></div>
                    <div style="position:absolute; left:371px; top:218px;"><p  style="font-family: Comic Sans MS, cursive, sans-serif; font-size: large;">El restaurante cuenta con un total de doce mesas.</p>
                        <p id='oculta10'> Seleccione la mesa que quiera reservar...</p></div>

                    </tr>
                </table>
                <h3 style="position: absolute; left: 200px; top: 500px; color: #B82B4B;">Ubicación de nuestro restaurante</h3>
                <iframe style="position: absolute; left: 60px; top: 560px;"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2892.307109098709!2d-7.04196098483836!3d43.537639779125435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd317e5791d65891%3A0xb83475fa4e03ced1!2sR%C3%BAa+Antonio+Otero%2C+10%2C+27700+Ribadeo%2C+Lugo!5e0!3m2!1szh-CN!2ses!4v1528139807486" width="1000" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            </section>


            <aside>
                <div id='oculto1' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 1</bold>

                    <form class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                          method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div>

                            <label for="telefono">Teléfono:</label>
                            <div >
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio1()">
                    </form>

                </div>

                <div id='oculto2' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 2</bold>
                    <form  class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                           method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio2()">
                    </form>
                </div>

                <div id='oculto3'style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 3</bold>
                    <form  class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                           method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono"
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio3()">
                    </form>
                </div>
                <div id='oculto4' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 4</bold>
                    <form class="la"  name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio4()">
                    </form>
                </div>
                <div id='oculto5' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 5</bold>
                    <form class="la"  name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio5()">
                    </form>
                </div>
                <div id='oculto6' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 6</bold>
                    <form  class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                           method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono"
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio6()">
                    </form>
                </div>
                <div   id='oculto7' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 7</bold>
                    <form class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div>
                                <label  for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio7()">
                    </form>
                </div>
                <div  class="la" id='oculto8' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 8</bold>
                    <form class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                          method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input  class="button" type="submit" value="Enviar Formulario" onclick="cambio8()">
                    </form>
                </div>
                <div id='oculto9' style='display:none; position:absolute; left:851px; top:288px;'>
                    <bold>MESA 9</bold>
                    <form  class="la" name="altaCV" action="<?php $_SERVER['PHP_SELF'] ?>"
                           method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $trabajado->getId() ?>">
                        <div>
                            <div class="la">
                                <label for="nombre">Nombre:</label>
                                <div>
                                    <input type="text" id="nombre" name="nombre"

                                           value="<?php echo $trabajado->getNombre() ?>">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="la">
                                <label for="apellidos">Primer apellido:</label>
                                <div>
                                    <input type="text" id="apellidos" name="apellidos"

                                           value="<?php echo $trabajado->getApellidos() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="la">
                            <label for="telefono">Teléfono:</label>
                            <div>
                                <input type="text" id="telefono" 
                                       name="telefono" value="<?php echo $trabajado->getTel() ?>">
                            </div>
                        </div>
                        <input class="button" type="submit" value="Enviar Formulario" onclick="cambio9()">
                    </form>
                </div>
                <div id='ocultoreserv' style='display:none;'>
                    Lo sentimos, esta mesa ya ha sido reservada anteriormente por otro cliente. Seleccione otra porfavor.

                </div>
                <h1 style="text-align: center;">NOTICIAS</h1> 
                <img src="img/2por1.png" width="362px" height="180px">
                <h2 style="text-align: center;">Los Jueves disfruta con nosotros</h2>
                <p style="text-align: center;"> Al realizar una reserva en el restaurante, por cada plato que pidas de carta, te llevarás otro igual totalemente Gratis.</p>
                <p style="text-align: center; font-size: large;">Los Jueves son para comer bien</p>
                <iframe width="362px" height="200px" src="https://www.youtube.com/embed/zeXwElAaDI4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <h2 style="text-align: center;">Disfruta de la entrevista a nuestro Chef de la casa!</h2>
                <p style="text-align: center;"> Aprendereis todos los secretos de la cocina.</p>


            </aside>




            <?php
            include 'includes/footer.inc.php';
            ?>
        </div>
    </body>
</html>