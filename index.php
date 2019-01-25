<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Tienda Games</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/united/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Asset" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="modelo/css/estilos.css">
    <script type="text/javascript" href="modelo/js/scripts.js"></script>
    <style>
        .navbar.navbar-default {
            margin-bottom: 0px;
        }

        #userNav:hover {
            background-color: #E95420;
        }

        .card {
            margin-top: 2%;
        }

        .card-footer a {
            margin-left: 3%;
        }

        section.catalog {
            padding: 0% 1%;
            margin-bottom: 2%;
            display: block;
            overflow: hidden;
        }

        .footer {
            background-color: rgba(215, 215, 215, 0.56);
            height: 100px;
            color: white;
            text-align: center;
        }

        a.navbar-brand {
            font-family: 'Arial', cursive;
            font-size: 40px;
        }

        .container {
            padding: 0px;
        }

        .footer .container p {
            margin-top: 5px;
        }

        body {
            background-color: rgba(255, 131, 105, 0.56);
        }
    </style>
</head>
<body>
<?php
session_start();
include 'controlador/conexion.php';
?>
<header>
    <div id="img"><img src="./modelo/imagenes/banner.jpg" width="100%"/></div>
</header>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">GAMES</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="./vista/inicio.php">Inicio</a></li>
                <li class="active"><a href="index.php">Catálogo</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['Usuario'])) {
                    echo "<li><a href='' id='userNav'>" . $_SESSION['Usuario'][0]['Usuario'] . "</a></li>";
                    if ($_SESSION['Usuario'][0]['Usuario'] == 'admin') {
                        ?>
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'
                               aria-expanded='false'><span class='fa fa-cog'></span></a>
                            <ul class='dropdown-menu' role='menu'>
                                <li><a href='vista/registro.php'>Usuarios</a></li>
                                <li><a href='modelo/admin/productos.php'>Productos</a></li>
                                <li><a href='vista/admin.php'>Pedidos</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        echo "<li><a href='modelo/login/panelU.php'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
                    }
                    echo "<li><a href='modelo/login/cerrar.php'>Salir</a></li>";
                } else {
                    echo "<li><a href='vista/registro.php'>Registro</a></li>";
                    echo "<li><a href='vista/login.php'>Login</a></li>";
                }
                ?>
                <li class="active"><a href="vista/carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="catalog">
    <center>
        <?php
        $re = mysqli_query($con, "select * from productos") or die(mysqli_error($con));
        while ($f = mysqli_fetch_array($re)) {
            ?>
            <div class="card-group">
                <div class="card col-xs-12 col-sm-6 col-md-3">
                    <img class="card-img-top" src="modelo/productos/<?php echo $f['imagenes']; ?>" width="250px"
                         height="150px">
                    <div class="card-block">
                        <h4 class="card-title"><?php echo $f['nombre']; ?></h4>

                    </div>
                    <div class="card-footer">
                        <span>Precio: <?php echo $f['precio']; ?>€/u</span>
                        <a href="vista/detalles.php?id=<?php echo $f['id']; ?>">ver</a>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </center>
</section>
<footer class="footer">
    <div class="container">
        <p>&nbsp;&nbsp;Francisco Javier Sanchez de la Torre&nbsp;&nbsp;</p>
        <p>Codigo en Github</p>
    </div>
</footer>
</body>
</html>