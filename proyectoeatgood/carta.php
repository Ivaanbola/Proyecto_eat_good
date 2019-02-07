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


        <link rel="stylesheet" type="text/css" href="estilos/css.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    </head>
    <body>

        <div class="contenedor">


            <header>

                <div></div>


            </header>

            <?php
            include 'includes/nav.inc.php';
            ?>

            <section >
                <table><tr>
                        <td><img src="img/cartasf.png" style="position: absolute; left: 340px; top:150px;" width="480px" height="800px"></td>

                    </tr></table>

            </section>
            <img src="img/codigo.png" style="position: absolute; left: 900px; top:750px;" width="150px" height="150px">
            <p style="position: absolute; left: 850px; top:900px;">Descargate nuestra app con este código QR</p>
            <aside>     
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