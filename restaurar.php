<?php
// si no es una petición redirijo a la principal
if($_SERVER['REQUEST_METHOD']!="POST"){
    header('location: index.html');
    die;}

    $conexion = mysqli_connect('localhost', 'root', '', 'prestamos')
    or die('Problemas con la conexión');

    $update = mysqli_query($conexion, "UPDATE usuarios SET balance = 0");

    $delete = mysqli_query($conexion, "DELETE FROM movimientos");

    $alter = mysqli_query($conexion, "ALTER TABLE movimientos AUTO_INCREMENT = 1");

    echo "Balances restaurados.";

    mysqli_close($conexion);
