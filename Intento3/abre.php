<?php //estoy avisando al servidor que voy a trabajar con php//

$conexion = new mysqli("localhost", "root", "","segura");
    if($conexion){
        echo "la gestion fue exitosa !!";
        header("Location: index.php");
    }else{
        echo "Fallo la gestion";
    }
?>

<?php //estoy avisando al servidor que voy a trabajar con php//

$conexion = new mysqli("localhost", "root", "","segura");
    if($conexion){
        echo "la gestion fue exitosa !!";
        header("Location: index.php");
    }else{
        echo "Fallo la gestion";
    }
?>