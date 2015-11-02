<?php

require 'clases/AutoCarga.php';
$sesion = new Session();
$subir = new FileUpload("archivo");
$subir->setDestino("canciones/");
if ($subir->upload()) {
    echo "Archivo subido con éxito";
    $cancion = new Cancion($subir->getNombre());
} else {
    echo "Archivo no subido";
}
$sesion->sendRedirect("user.php");

