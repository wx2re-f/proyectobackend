<?php
session_start();
//con session_start() creamos la sesión si no existe o la retomamos si ya ha
//sido creada

$id=$_GET['id'];

// Conexion
$conexion = mysqli_connect("127.0.0.1", "root", "");
//incluímos la conexión a nuestra base de datos
mysqli_select_db($conexion, "tienda_potrero");


if(!isset($cantidad)){$cantidad=1;}
//Como también vamos a usar este archivo para actualizar las cantidades,
//hacemos que cuando la misma no esté indicada sea igual a 1

$consulta="SELECT * FROM ropa WHERE id= $id";
//  Ejecutar la orden y obtenemos los registros
$datos= mysqli_query($conexion, $consulta);

$reg = mysqli_fetch_array($datos);

//Si ya hemos introducido algún producto en el carro lo tendremos guardado
//temporalmente en el array superglobal $_SESSION['carro'], de manera que
//rescatamos los valores de dicho array y se los asignamos a la variable $carro,
//previa comprobación con isset de que $_SESSION['carro'] ya haya sido definida
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];

//Ahora introducimos el nuevo producto en la matriz $carro, utilizando como índice
// el id del producto en cuestión, encriptado con md5. Utilizamos md5 porque genera
//un valor alfanumérico que luego, cuando busquemos un producto en particular dentro
//de la matriz, no podrá ser confundido con la posición que ocupa dentro de dicha
//matriz, como podría ocurrir si fuera sólo numérico. Cabe aclarar que si el producto
//ya había sido agregado antes, los nuevos valores que le asignemos reemplazarán
//a los viejos.
//Al mismo tiempo, y no porque sea estrictamente necesario sino a modo de ejemplo,
//guardamos más de un valor en la variable $carro, valiéndonos de la
//herramienta array.
$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'id'=>$id,
'imagen'=>$reg['imagen'],'marca'=>$reg['marca'],'precio'=>$reg['precio'],
'tipo_prenda'=>$reg['tipo_prenda']);

//Ahora dentro de la sesión ($_SESSION['carro']) tenemos sólo los valores que teníamos
// (si es que teníamos alguno) antes de ingresar a esta página y en la variable $carro
//tenemos esos mismos valores más el que acabamos de sumar. De manera que
//tenemos que actualizar (reemplazar) la variable de sesión por la variable $carro.
$_SESSION['carro']=$carro;

//Y volvemos a nuestro catálogo de artículos. La cadena SID representa al
//identificador de la sesión, que, dependiendo  de la configuración del servidor
//y de si el usuario tiene o no activadas las cookies puede no ser necesario
//pasarla por la url. Pero para que nuestro carro funcione, independientemente
//de esos factores, conviene escribirla siempre.
header("Location:vercarrito.php?".SID."&id=".$id."&precio=".$precio);
?>
