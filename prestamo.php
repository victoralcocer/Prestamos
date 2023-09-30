<?php
// si no es una petición redirijo a la principal
if($_SERVER['REQUEST_METHOD']!="POST"){
    header('location: index.html');
    die;}

    $emisor = $_REQUEST['emisor'];
    $receptor = $_REQUEST['receptor'];
    $cantidad = $_REQUEST['cantidad'];

    if($cantidad>0){
        $conexion = mysqli_connect('localhost', 'root', '', 'prestamos')
        or die('Problemas con la conexión');
    
        $select = mysqli_query($conexion, "SELECT * from usuarios where nombre = '$emisor' or nombre = '$receptor'");
    
        $contador = 0;
    
        while($datos=mysqli_fetch_array($select)){
            $contador++;
        }
    
        if($contador==2){
    
            $update1 = mysqli_query($conexion, "UPDATE usuarios SET balance= balance - $cantidad WHERE nombre = '$emisor'");
            $update1 = mysqli_query($conexion, "UPDATE usuarios SET balance= balance + $cantidad WHERE nombre = '$receptor'");
            $insert = mysqli_query($conexion, "INSERT INTO movimientos(emisor, receptor, cantidad) VALUES ('$emisor','$receptor','$cantidad')");
    
            echo "Préstamo realizado con éxito.";
    
        } else {
            
            echo "No se ha podido realizar el préstamo.";
    
        }

        mysqli_close($conexion);
    } else{
        echo "No se ha podido realizar el préstamo.";
    };
