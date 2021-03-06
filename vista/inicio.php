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
    <link rel="stylesheet" type="text/css" href="../modelo/css/estilos.css">
    <script type="text/javascript" href="../modelo/js/scripts.js"></script>
    <style>
        .navbar.navbar-default {
            margin-bottom: 30px;
        }

        #userNav:hover {
            background-color: #E95420;
        }

        section.inicio {
            padding: 0% 1%;
            margin-bottom: 2%;
            display: block;
            overflow: hidden;
            min-height: 391px;
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

        .texto {
            text-align: justify;
        }

        body {
            background-color: rgba(255, 131, 105, 0.56);
        }
    </style>
</head>
<body>
<?php
session_start();
include '../controlador/conexion.php';
?>
<header>
    <div id="img"><img src="../modelo/imagenes/banner.jpg" width="100%"/></div>
</header>
<!-- navbar -->
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
                <li class="active"><a href="../vista/inicio.php">Inicio</a></li>
                <li><a href="../index.php">Catálogo</a></li>
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
                                <li><a href='registro.php'>Usuarios</a></li>
                                <li><a href='../modelo/admin/productos.php'>Productos</a></li>
                                <li><a href='admin.php'>Pedidos</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        echo "<li><a href='../modelo/login/panelU.php'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
                    }
                    echo "<li><a href='../modelo/login/cerrar.php'>Salir</a></li>";
                } else {
                    echo "<li><a href='registro.php'>Registro</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
                ?>
                <li class="active"><a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="inicio">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <img src="../modelo/imagenes/inicio.png" width="100%">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 texto">
            <p>Somos un negocio familiar que lleva 40 años dedicados a la recreacion del tiempo libre y ocio. Llevamos
                todo este tiempo distibuyendo juegos de mesa, naipes, complementos y accesorios para que tus partidas
                sean unicas</p>
            <p>
                Generaciones han confiado en nosostros por nuestra atencion al cliente, servicio y precio excelente.
                Siempre te garantizamos lo mejor.
            </p>
            <p>
                Si tienes cualquier duda ponte en contacto con nosotros y pide tu presupuesto sin ningun compromiso!
            </p>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container">
        <p>&nbsp;&nbsp;Francisco Javier Sanchez de la Torre&nbsp;&nbsp;</p>
        <p>Codigo en Github</p>
    </div>
</footer>
</body>
</html>