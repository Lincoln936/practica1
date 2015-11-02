<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
if ($sesion->isLogged()) {
    $sesion->sendRedirect("user.php");
}
$nombre = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subida canciones</title>
    </head>
    <body>
        Login usuario:
        <?php
        if (!$sesion->isLogged()) {
            ?>
            <form action="phplogin.php" method="POST" enctype="multipart/form-data">
                Usuario: <input type="text" name="user" value="" /><br/>
                Contraseña: <input type="password" name="password" value="" /><br/>
                <input type="submit" value="Login"/>
            </form>
            <?php
        } else {
            ?>
            <a href="phplogout.php">Logout</a>
            <?php
        }
        ?>
    </body>
</html>
