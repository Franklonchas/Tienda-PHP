<?php
session_start();
include '../controlador/conexion.php';
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
        $carro = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($carro); $i++) {
            if ($carro[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $carro[$numero]['Cantidad'] = $carro[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $carro;
        } else {
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $resultado = mysqli_query($con, "select * from productos where id=" . $_GET['id']);
            while ($f = mysqli_fetch_array($resultado)) {
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagenes'];
            }
            $datosNuevos = array('Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1);
            array_push($carro, $datosNuevos);
            $_SESSION['carrito'] = $carro;
        }
    }

} else {
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = 0;
        $imagen = "";
        $resultado = mysqli_query($con, "select * from productos where id=" . $_GET['id']);
        while ($f = mysqli_fetch_array($resultado)) {
            $nombre = $f['nombre'];
            $precio = $f['precio'];
            $imagen = $f['imagenes'];
        }
        $carro[] = array('Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'Cantidad' => 1);
        $_SESSION['carrito'] = $carro;
    }
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
    <link rel="stylesheet" type="text/css" href="../modelo/css/estilos.css">
    <script type="text/javascript" src="../modelo/js/scripts.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <style>
        .navbar.navbar-default {
            margin-bottom: 0px;
        }

        #userNav:hover {
            background-color: #E95420;
        }

        section.carrito {
            padding: 0% 1%;
            margin-bottom: 2%;
            display: block;
            overflow: hidden;
            min-height: 391px;
            margin: auto;
        }

        .footer {

            background-color: #2047e9;
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

        .footer {
            background-color: rgba(215, 215, 215, 0.56);
            margin-top: 5%;
        }

        .datos {
            padding: 0px;
            text-align: left;
            display: inline-block;
        }

        .datos p {
            color: black;
        }

        .producto {
            margin-top: 5%;
        }

        th {
            min-width: 250px;
        }

        th:first-child {
            min-width: 300px;
        }

        tr {
            height: 100px;
        }

        .centrado {
            margin: auto;
        }

        .dcha {
            text-align: right;
        }

        body {
            background-color: rgba(255, 131, 105, 0.56);
        }
    </style>
</head>
<body>
<header>
    <div id="img"><img src="../modelo/imagenes/banner.jpg" width="100%"/></div>
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
                <li><a href="inicio.php">Inicio</a></li>
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
<section class="carrito">
    <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-1">
        <?php
        $total = 0;
        if (isset($_SESSION['carrito'])) {
        ?>
        <table>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Eliminar</th>
            </tr>
            <?php
            $datos = $_SESSION['carrito'];
            $total = 0;
            for ($i = 0; $i < count($datos); $i++) {
                ?>
                <tr class="producto">
                    <td>
                        <img src="../modelo/productos/<?php echo $datos[$i]['Imagen']; ?>" width="100px" height="70px">
                        <span>&nbsp;&nbsp;<?php echo $datos[$i]['Nombre']; ?></span>
                    </td>
                    <td><?php echo $datos[$i]['Precio']; ?>€</td>
                    <td><input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
                               data-precio="<?php echo $datos[$i]['Precio']; ?>"
                               data-id="<?php echo $datos[$i]['Id']; ?>"
                               class="cantidad"></td>
                    <td><span class="subtotal"><?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad']; ?>€</span></td>
                    <td style="padding: 0% 3%;"><a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'] ?>"><i
                                    class="fa fa-times" aria-hidden="true"></i></a></td>

                </tr>
                <?php
                $total = ($datos[$i]['Precio'] * $datos[$i]['Cantidad']) + $total;
            }
            echo '</table>';


            } else {
                echo '<center><p style="margin-top:20px;">El carrito esta vacio</p></center>';
            }
            echo '<center class="dcha"><h2 id="total" >Total: ' . $total . '€</h2></center>';
            if ($total != 0) {
                echo '<center class="dcha"><a href="./compras.php" class="aceptar"><strong>Realizar Pedido</strong></a></center>';
            }
            ?>
            <center class="dcha"><a href="..">Seguir comprando</a></center>
        </table>
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