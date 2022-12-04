<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <h1>Tienda de ropa</h1>
<br>
    <button type="submit"><a href="index.html">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar ropa</a></button>
    <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
    <button type="submit"><a href="nike.php">nike</a></button>
    <button type="submit"><a href="buzo.php">buzo</a></button>
    <button type="submit"><a href="precio.php">Precio mayor a 500</a></button>
      <button type="submit"><a href="borrar.php">borrar</a></button>
      <button type="submit"><a href="modificar.php">Modificar</a></button>
    <br>
    <h2>Lista de Ropa</h2>
    <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>TIPO DE PRENDA</th>
        <th>MARCA</th>
        <th>TALLE</th>
        <th>PRECIO</th>
      </tr>

<!-- 1.Conexion. Almacenamos los datos del envio POST -->
<?php
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_ropa");

// <!-- 2.Preparar la orden SQL.-->

$tipo_prenda = $_POST ['tipo_prenda'];
$marca = $_POST ['marca'];
$talle = $_POST ['talle'];
$precio = $_POST ['precio'];

$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

// <!-- 3.Ejecutar la orden SQL-->

$consulta = "INSERT INTO ropa(id,tipo_prenda,marca,talle,precio,imagen)
             VALUES('','$tipo_prenda','$marca','$talle','$precio','$imagen')";

// <!-- 4. ejecutar la orden e ingresamos datos y reedirigir a index-->

mysqli_query ($conexion, $consulta);

header ('location:index.html');

       ?>

  </body>
</html>
