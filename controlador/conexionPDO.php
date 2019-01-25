<?php
try {
    $username = "admin";
    $password = "admin";
    $mbd = new PDO('mysql:host=localhost;dbname=tienda', 'admin', 'admin');
    foreach ($mbd->query('SELECT * from FOO') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error en la conecion de la BD tienda.sql!: " . $e->getMessage() . "<br/>";
    die();
}
?>