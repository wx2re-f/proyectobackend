<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>panel</title>
  </head>
  <body>
<h1> PANEL DE CONTROL </h1>
<h2>BIENVENIDOS : <?php echo $_SESSION["usuario"] ?></h2>
<a href="cerrarsesion.php">cerrar sesion</a>
  </body>
</html>
