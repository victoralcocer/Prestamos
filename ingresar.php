<?php
// si no es una petición redirijo a la principal
if($_SERVER['REQUEST_METHOD']!="POST"){
    header('location: index.html');
    die;}

    $usuario=$_REQUEST['usuario'];

    if($usuario!=""){
        $conexion = mysqli_connect('localhost', 'root', '', 'prestamos')
        or die('Problemas con la conexión');
    
        $select = mysqli_query($conexion, "SELECT * from usuarios where nombre = '$usuario'");
    
        $contador = 0;
    
        while($datos=mysqli_fetch_array($select)){
            $contador++;
        }
    
        if($contador>0){
    
            echo "Ya existe ese usuario";
            
        } else {         
            $insert = mysqli_query($conexion, "INSERT INTO usuarios(nombre, balance) VALUES ('$usuario','0')")
            or die('Problemas al seleccionar: '.mysqli_error($conexion));
            
            echo "Usuario añadido con éxito";
        };
    
        mysqli_close($conexion);
        
    } else {

        echo "Debes introducir un nombre";
    }

 


    