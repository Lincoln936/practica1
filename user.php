<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
if (!$sesion->isLogged()) {
    $sesion->sendRedirect("subidaArchivos.php");
}
$user = $sesion->getUser();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Lista de canciones completa</h2>
        <ul>
            <li>
                <span>THE ONE REMIX (MASTER) -</span>
                <audio controls height="100" width="100">
                    <source src="canciones/THE ONE REMIX (MASTER).mp3" type="audio/mpeg">
                    <embed height="50" width="100" src="canciones/THE ONE REMIX (MASTER).mp3">
                </audio>
            </li>
            <li>
                <span>Kalimba -</span>
                <audio controls height="100" width="100">
                    <source src="canciones/Kalimba.mp3" type="audio/mpeg">
                    <embed height="50" width="100" src="canciones/Kalimba.mp3">
                </audio>
            </li>
            <li>
                <span>Maid with the Flaxen Hair -</span>
                <audio controls height="100" width="100">
                    <source src="canciones/Maid with the Flaxen Hair.mp3" type="audio/mpeg">
                    <embed height="50" width="100" src="canciones/Maid with the Flaxen Hair.mp3">
                </audio>
            </li>
            <li>
                <span>Sleep Away -</span>
                <audio controls height="100" width="100">
                    <source src="canciones/Sleep Away.mp3" type="audio/mpeg">
                    <embed height="50" width="100" src="canciones/Sleep Away.mp3">
                </audio>
            </li>
        </ul>
        <br/>
        <form action="phpSubido.php" method="post"
              enctype="multipart/form-data">
            <label>Elija una canción para subir</label><br/>
            <input type="file" name="archivo"/>
            <input type="submit" />
        </form>
        <?php
            if($sesion->isLogged()){
        ?>
        <form action="phplogout.php" method="POST">
            <input type="submit" value="Logout"/>
        </form>
        <?php
            }
        ?>    
    </body>
</html>
