<?php
require_once './clases/Persona.php';
require_once './clases/bd.php';
if (isset($_POST) && !empty($_POST)) {
    
}
?>


<!DOCTYPE html>
<html>


    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>
            EAT GOOD
        </title>

        <link rel="stylesheet" type="text/css" media="screen and (max-device-width: 400px)" href="tinyScreen.css" />		

        <link rel="stylesheet" type="text/css" media="screen and (min-width: 400px) and (max-device-width: 600px)" href="smallScreen.css" />	
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

            <section>


                <h1 style="text-align: center">Welcome to our website </h1>
                <h1 style="text-align: center">Eat Good™</h1>
                <h3 style="text-align: center;">Working with I´m your Web™ company</h3>

                <p style="text-align: center"><marquee direction="left">We wanted to make easier the work for our costumers pudiendo realizar pedidos
                    fácilmente seleccionando los platos, postres y bebidas que desees, a través de repartidores disponibles que lleven a
                    sus casas en el menor tiempo posible.

                    De igual modo contamos con una parte de la web donde realizar las reservas de mesas en el propio restaurante, rellenando un pequeño formulario.
                    Todos nuestros platos disponibles se encuentran en la pestaña "Carta".</p></marquee>

                <img class="foto500" src="img/logos.png" style="position: absolute; left: 0px; top:750px;" width="1000px" height="250px" >
                

            </section>

            <aside>

                <h1 style="text-align: center;">Noticias</h1>
                <img src="img/2por1.png" width="362px" height="180px">
                <h2 style="text-align: center;">Los jueves son para Eat Good </h2>
                <p style="text-align: center;"> Con la reserva online obtendras un descuento del 20% del descuento.</p>
                <p style="text-align: center; font-size: large;">Eat good Thursdays</p>
                <iframe width="362px" height="200px" src="https://www.youtube.com/embed/zeXwElAaDI4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <h2 style="text-align: center;">Disfruta de la entrevista a nuestro Chef de la casa!</h2>
                <p style="text-align: center;"> Aprendereis todos los secretos de la cocina.</p>
                <img src="img/imyw.png" style="position: absolute; left: 1010px; top:790px;" width="120px" height="120px" >


            </aside>




            <?php
            include 'includes/footer.inc.php';
            ?>
            
        </div>
    </body>
</html>