<aside>
    <div class="formularioLogin">
        <form name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>E-Mail</td>
                </tr>
                <tr>
                    <td><input type="text" name="mail" placeholder="E-mail"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                </tr>
                <tr>
                    <td><input type="password" name="contraseña" placeholder="Contraseña"></td>
                </tr>
                <tr>
                    <td><input type="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</aside>