<?php
require 'clases/AutoCarga.php';
$sesion = new Session();
$sesion->destroy();
$sesion->sendRedirect("subidaArchivos.php");