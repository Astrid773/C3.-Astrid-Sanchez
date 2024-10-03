<?php

     include("abre.php");

     $Nombre       = $_POST['Nombre'];
     $Apellidos    = $_POST['Apellidos'];
     $correo       = $_POST['correo'];
     $contrasena         = $_POST['contrasena'];

     $consulta = "INSERT INTO signup(Nombre, Apellidos, correo, contrasena) VALUES
    ('$Nombre','$Apellidos','$correo','$contrasena')";


         if ($conexion->query($consulta) === TRUE){
    header("Location: index.php");
}else{
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }
    $conexion->close();
?>