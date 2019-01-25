<?php
session_start();
include '../../controlador/conexion.php';
if (isset($_SESSION['Usuario'])) {

} else {
    header("Location: ../../index.php?Error=Acceso denegado");
}
?>

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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/modificar.js"></script>
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

        section.modif {
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
            font-family: 'Asset', cursive;
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
<header>
    <div id="img"><img src="../imagenes/banner.jpg" width="100%"/></div>
</header>
<section class="modif">
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
                            <li class='dropdown active'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button'
                                   aria-expanded='false'><span class='fa fa-cog'></span></a>
                                <ul class='dropdown-menu' role='menu'>
                                    <li><a href='../../vista/registro.php'>Usuarios</a></li>
                                    <li><a href='#'>Productos</a></li>
                                    <li><a href='../../vista/admin.php'>Pedidos</a></li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            echo "<li><a href='../login/panelU.php'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
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

    <center><h1>Añadir producto</h1></center>
    <form class="col-xs-offset-4 col-xs-4 col-sm-offset-4 col-sm-4 col-md-offset-4 col-md-4" action="altaproducto.php"
          method="post" enctype="multipart/form-data">
        <?php
        if (isset($GET['error'])) {
            echo "<center>Introduce todos los campos</center>";
        } elseif (isset($_GET['correcto'])) {
            echo "<center>El producto se añadió correctamente</center>";
        }
        ?>
        <fieldset class="form-group">
            Nombre
            <input type="text" name="nombre" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            Descripción
            <input type="text" name="descripcion" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            Imagen
            <input type="file" name="file">
        </fieldset>
        <fieldset class="form-group">
            Precio
            <input type="text" name="precio" class="form-control">
        </fieldset>
        <input type="submit" name="accion" value="Enviar" class="btn btn-primary aceptar">
    </form>

    <div class="clearfix"></div>
    <br><br>

    <center><h1>Gestión de productos</h1></center>
    <table class="table col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Modificar</td>
            <td>Eliminar</td>
        </tr>
        <?php
        $datos = mysqli_query($con, "select * from productos");
        while ($fila = mysqli_fetch_array($datos)) {
            echo '
				<tr>
					<td>
						<input type="hidden" value="' . $fila['id'] . '">' . $fila['id'] . '
						<input type="hidden" class="imagen" value="' . $fila['imagenes'] . '">
					</td>
					<td><input type="text" class="nombre form-control" value="' . $fila['nombre'] . '"></td>
					<td><input type="text" class="descripcion form-control" value="' . $fila['descripcion'] . '"></td>
					<td><input type="text" class="precio form-control" value="' . $fila['precio'] . '"></td>
					<td><button class="modificar btn btn-primary" data-id="' . $fila['id'] . '">Modificar</button></td>
					<td><a class="eliminar" data-id="' . $fila['id'] . '"><i class="fa fa-times" aria-hidden="true"></i></a></td>
				</tr>
				';
        }
        ?>
    </table>
</section>
<div class="clearfix"></div>
<footer class="footer">
    <div class="container">
        <p>&nbsp;&nbsp;Francisco Javier Sanchez de la Torre&nbsp;&nbsp;</p>
        <p>Codigo en Github</p>
    </div>
</footer>
</body>
</html>