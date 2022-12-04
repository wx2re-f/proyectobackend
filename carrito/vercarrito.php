<?php
//Creamos sesión, traemos el id con el metodo GET y la conexión con la base de datos.
session_start();

error_reporting(0); // para que no salga el error cuando ingresamos al carrito sin cargar un producto.

$id=$_GET['id'];

//Comprobamos que la variable $carro tenga valor.
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

 <?php if($carro){ // Si $carro tiene algo lo muestra en la tabla. ?>
<table>
    <tr>
      <td width="9%">MARCA</td>
      <td width="14%">PRENDA</td>
      <td width="19%">PRECIO</td>
      <td width="10%">BORRAR</td>
    </tr>
<?php
$contador=0;
$suma=0;

foreach($carro as $k => $v){
       $subto=$v['cantidad']*$v['precio'];
       $suma=$suma+$subto;
       $contador++; ?>

<div>

   <tr bgcolor="skyblue">

      <td>
        <?php echo $v['marca']  ?>
      </td>

      <td>
      <?php echo $v['tipo_prenda']  ?>
      </td>

      <td>
      <?php echo $v['precio'] ?> $<br />
      </td>

      <td>
        <p><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id']?>">
        <span class="txtrojo">X</span> QUITAR DEL CARRITO</a></p>
      </td>

     </tr>
   </div>
     <tr>
<?php } //fin foreach ?>


      <td colspan="5">
        <p>TOTAL  PRODUCTOS:S <?php echo count($carro); ?>
        <br/>
        TOTAL PRECIO: <?php echo number_format($suma,2); ?> $</p>
      </td>

    </tr>
</table>

<div id="boton"><a href="index.php?<?php echo SID?>">CONTINUAR COMPRA</a></div>


<?php }else{ // // Si $carro NO tiene nada solo muestra un link a index.php.?>
<p>El carrito de compra está vacío.</p>

<div id="boton"><a href="index.php<?php echo SID?>">CONTINUAR COMPRA</a></div>

<?php }// cierre del else?>

</body>
</html>
