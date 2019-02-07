<?php
require_once './clases/Persona.php';
require_once './clases/bd.php';
if (isset($_POST) && !empty($_POST)) {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            EAT GOOD
        </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="estilos/css.css">
    </head>
    <body>

        <div class="contenedor">


            <header>

                <div></div>


            </header>

            <?php
            include 'includes/nav.inc.php';
            ?>


            <section style="text-align: center">

                
                <p>Síguenos en nuestra página oficial de Instagram y Facebook: Eat Good.</p>

                <p>También puedes escribirnos a nuestro correo personal: info_help@eatgood.com</p>
             
                <table>
                    <h2>HORARIOS</h2>
                    <li>Lunes	        12h30 - 14h00 / 19h30 - 22h30</li>
                    <li>Martes               12h30 - 14h00 / 19h30 - 22h30</li>
                    <li>Miercoles	        12h30 - 14h00 / 19h30 - 22h30</li>
                    <li>Jueves  	        12h30 - 14h00 / 19h30 - 22h30</li>
                    <li>Viernes	        12h30 - 14h00 / 19h30 - 22h30</li>
                    <li>Sabado  	        19h30 - 22h30</li>
                    <li>Domingos y festivos	Cerrado</li>
                    <h2>TRANSPORTE</h2>
                    <li>Metro	Linea 1/13 : Rúa de Antonio Otero</li>
                </table>
                
                
                <p style="position: absolute; left: 200px; top:600px;">Para alguna duda o sugerencia llamanos a nuestro teléfono de contacto: </p>
                <img src="img/telefono.png" style="position: absolute; left: 500px; top:650px;">
                <p style="position: absolute; left: 800px; top:740px; font-size: xx-large; color: #B82B4B;">912738370</p>


            </section>

            <aside>
                <h1 style="text-align: center;">NOTICIAS</h1> 
                <img src="img/2por1.png" width="362px" height="180px">
                <h2 style="text-align: center;">Los Jueves disfruta con nosotros</h2>
                <p style="text-align: center;"> Al realizar una reserva en el restaurante, por cada plato que pidas de carta, te llevarás otro igual totalemente Gratis.</p>
                <p style="text-align: center; font-size: large;">Los Jueves son para comer bien</p>
                <iframe width="362px" height="200px" src="https://www.youtube.com/embed/zeXwElAaDI4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <h2 style="text-align: center;">Disfruta de la entrevista a nuestro Chef de la casa!</h2>
                <p style="text-align: center;"> Aprendereis todos los secretos de la cocina.</p>
                <img src="img/calendario.png" style="position: absolute; left: 800px; top:220px;" width="270px" height="270px">

            </aside>





            <?php
            include 'includes/footer.inc.php';
            ?>

        </div>
    </body>
</html>