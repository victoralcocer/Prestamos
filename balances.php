<?php
// si no es una petición redirijo a la principal
if($_SERVER['REQUEST_METHOD']!="POST"){
    header('location: index.html');
    die;}

    $conexion = mysqli_connect('localhost', 'root', '', 'prestamos')
    or die('Problemas con la conexión');

    $select = mysqli_query($conexion, "SELECT * from usuarios where balance != 0");

    $contador = 0;

    while($datos=mysqli_fetch_array($select)){
        $contador++;
    };

    if($contador>0){
        $select2 = mysqli_query($conexion, "SELECT * from usuarios where balance != 0 order by balance ");

        echo "<table><tr><th>Usuario</th><th>Balance</th></tr>";
        while($datos=mysqli_fetch_array($select2)){
            echo "<tr><td>$datos[nombre]</td><td>$datos[balance] €</td></tr>";
        }
    
        echo "</table>";
    };


    mysqli_close($conexion);

    

