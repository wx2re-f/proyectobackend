<?php
//Creamos sesión
session_start();
if(isset($_SESSION['carro'])) // chequeamos si existe una variable de sessión la guarda en $carro
$carro=$_SESSION['carro'];
else $carro=false; // si no hay le da el valor de falso.
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="vercarrito.php">CARRITO</a></li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            Administrador
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                  <?php
                  // 1) Conexion
                  $conexion = mysqli_connect("127.0.0.1", "root", "");
                  mysqli_select_db($conexion, "tienda_potrero");

                  // 2) Preparar la orden SQL
                  // Sintaxis SQL SELECT
                  // SELECT * FROM nombre_tabla
                  // => Selecciona todos los campos de la siguiente tabla
                  // SELECT campos_tabla FROM nombre_tabla
                  // => Selecciona los siguientes campos de la siguiente tabla
                  $consulta='SELECT * FROM ropa';

                  // 3) Ejecutar la orden y obtenemos los registros
                  $datos= mysqli_query($conexion, $consulta);

                  //  recorro todos los registros y genero una CARD PARA CADA UNA
                  while ($reg = mysqli_fetch_array($datos)) {?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                              <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>" alt="")>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['marca']) ?></h5>
                                    <!-- Product price-->
                                    <span>$ <?php echo $reg['precio']; ?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="    ">View options</a></div>
                                <div class=""><?php
                                  if(!$carro || !isset($carro[md5($reg['id'])]['identificador']) ||
                                  $carro[md5($reg['id'])]['identificador']!=md5($reg['id'])){
                                  //si el producto no ha sido agregado, mostramos el
                                  //botón AÑADIR AL CARRITO linkeada a nuestra pagina de agregacar.php
                                  //y transmitiéndole a dicha página el id del artículo y
                                  //el identificador de la sesión.?>
                                  <p><a href="agregacar.php?<?php echo SID ?>&id=<?php echo $reg['id']?>">
                                  AÑADIR AL CARRITO</a></p>
                                  <?php  } else {
                                  //en caso contrario mostramos el otro
                                  //botón QUITAR DEL CARRITO linkeada a la página
                                  //que sirve para borrar el artículo del carro: borrarcar.php?>
                                  <p><a href="borracar.php?<?php echo SID ?>&id=<?php echo $reg['id']?>">
                                  <span class="txtrojo">X</span> QUITAR DEL CARRITO</a></p>
                                <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
