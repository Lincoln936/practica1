<?php

require 'clases/AutoCarga.php';
$usuarios = array(
    "usuario1" => "usuario1",
    "usuario2" => "usuario2",
);

$user = Request::post("user");
$password = Request::post("password");
$sesion = new Session();

if (isset($usuarios[$user]) && $usuarios[$user] == $password) {
    $usuario = new Usuario($user);
    $sesion->setUser($usuario);
    $sesion->sendRedirect("user.php");
} else {
    $sesion->destroy();
    $sesion->sendRedirect("subidaArchivos.php");
}