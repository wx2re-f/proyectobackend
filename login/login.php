<?php
$usuario = $_POST ["user"];
$contrasenia = $_POST ["pass"];
session_start();
$_SESSION["usuario"] = $usuario;

if $_SESSION[""] or $_SESSION["null"];

$consulta = "SELECT * FROM usuarios WHERE 'usuario' = $_SESSION["usuario"]" and "permiso" = "admin";

$ckuser= "admin";
$ckpass= "1234";

if ($contrasenia == $reg["pass"]) {
  header("location:panel.php");
}
else {
  header("location:error.html");
}

 ?>
