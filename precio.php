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
    <button type="submit"><a href="index.html">Inicio</a></button>
    <button type="submit"><a href="listar.php">Listar ropa</a></button>
    <button type="submit"><a href="agregar.html">Agregar ropa</a></button>
    <button type="submit"><a href="nike.php">nike</a></button>
    <button type="submit"><a href="buzo.php">buzo</a></button>
    <button type="submit"><a href="precio.php">Precio mayor a 500</a></button>
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

// <!-- 2.Preparar la orden SQL.
// Sintaxis SQL SELECT.
// SELECT * FROM nombre_tabla.
// SELECT campos_tabla FROM nombre_tabla-->

$consulta= "SELECT*FROM ropa WHERE Precio > 500 ";

// <!-- 3.Ejecutar la orden y obtenemos los registros-->

$datos= mysqli_query ($conexion, $consulta);

// <!-- 4. Mostrar los datos del registro-->

while ($reg =mysqli_fetch_array($datos)) {
    <tr>
    <td>?> <?php echo $reg['id']; ?><?php</td>
    <td>?> <?php echo $reg['Tipo_prenda']; ?><?php</td>
    <td>?> <?php echo $reg['Marca']; ?><?php</td>
    <td>?> <?php echo $reg['Talle']; ?><?php</td>
    <td>?> <?php echo $reg['Precio']; ?><?php</td>
    </tr>
}

       ?>
</table>
  </body>
</html>
