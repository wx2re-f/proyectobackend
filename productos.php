<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda_ropa");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ropa WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Ropa</title>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
</head>
<body>

  <header>
    <header class="bg-dark py-5">
       <div class="container px-4 px-lg-5 my-5">
           <div class="text-center text-white">
               <h1 class="display-4 fw-bolder">Ugareño Digital</h1>
               <p class="lead fw-normal text-white-50 mb-0">Producto en promoción</p>
           </div>
       </div>
  </header>
  <?php
  // 6) asignamos a diferentes variables los respectivos valores del array $datos.
  // este paso no es estrictamente necesario, pero es mas practico
  //para despues llamarlos solo con el nombre de la variable
  $tipo_prenda=$datos["tipo_prenda"];
  $marca=$datos["marca"];
  $talle=$datos["talle"];
  $precio=$datos["precio"];
  $imagen=$datos['imagen'];?>

  <!-- mostramos los datos de ese único producto
  lo meto en una card, pero se puede mostrar como quieran-->

  <div class="container">
    <div class="row">
      <div class="card w-50">
        <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>" alt="..." />
          <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($datos['imagen2'])?>" alt="..." />
           <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode ($datos['imagen3'])?>" alt="..." />
        <div class="card-body">
          <h5 class="card-title">Marca: <?php echo $marca;?></h5>
          <p class="card-text">Talle: <?php echo $talle?></p>
          <p class="card-text">$<?php echo $datos["precio"];?></p>
          <p class="card-text"><?php echo $datos["colores"];?></p>
          <a href="<?php echo $reg['link']; ?>" class="btn btn-primary">Comprar</a>
        </div>
      </div>
    </div>
  </div>

<footer>
<br>
<h2>footer</h2>
</footer>


  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->



  <script src="js/scripts.js"></script>
</body>
</html>
