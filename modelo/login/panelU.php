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
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script type="text/javascript" href="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/modificarU.js"></script>
    <script type="text/javascript" src="../js/panelU.js"></script>
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

        section.panel {
            padding: 0% 1%;
            margin-bottom: 2%;
            display: block;
            overflow: hidden;
            min-height: 450px;
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

        .table {
            width: 80%;
        }

        body {
            background-color: rgba(255, 131, 105, 0.56);
        }
    </style>
</head>
<body>
<?php
session_start();
include '../../controlador/conexion.php';
?>
<header>
    <div id="img"><img src="../imagenes/banner.jpg" width="100%"/></div>
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
                <li><a href="../../vista/inicio.php">Inicio</a></li>
                <li><a href="../../index.php">Catálogo</a></li>
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
                                <li><a href='../../vista/registro.php'>Usuarios</a></li>
                                <li><a href='../admin/productos.php'>Productos</a></li>
                                <li><a href='../../vista/admin.php'>Pedidos</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        echo "<li><a href=' ' class='active'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
                    }
                    echo "<li><a href='../login/cerrar.php'>Salir</a></li>";
                } else {
                    echo "<li><a href='../../vista/registro.php'>Registro</a></li>";
                    echo "<li><a href='../../vista/login.php'>Login</a></li>";
                }
                ?>
                <li class="active"><a href="../../vista/carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="panel">
    <center><h1>Modificar datos</h1></center>
    <table class="table col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Usuario</th>
            <th>Password</th>
            <th>Modificar</th>
        </tr>
        <?php
        $usuario = $_SESSION['Usuario'][0]['Usuario'];
        $sql = "select * from usuarios where Usuario='$usuario'";
        $datos = mysqli_query($con, $sql);
        while ($fila = mysqli_fetch_array($datos)) {
            echo '
				<tr>
					<td><input type="text" class="nombre form-control" value="' . $fila['Nombre'] . '"></td>
					<td><input type="text" class="apellido form-control" value="' . $fila['Apellido'] . '"></td>
					<td><input type="text" class="usuario form-control" value="' . $fila['Usuario'] . '"></td>
					<td><input type="password" class="password form-control" value="' . $fila['Password'] . '"></td>
					<td><button class="modificar btn btn-primary" data-id="' . $fila['Id'] . '">Modificar</button></td>
				</tr>
				<tr>
				<td></td><td></td>
				<td><button style="margin-top: 30px;" class="eliminar btn btn-primary" data-id="' . $fila['Id'] . '">Dar de baja</button></td>
				</tr>
				';
        }
        ?>
    </table>

</section>
<footer class="footer">
    <div class="container">
        <p>Francisco Javier Sanchez de la Torre</p>
        <p>Codigo en Github</p>
    </div>
</footer>
</body>
</html>