<?php

session_start();

$intentosPermitidos = 3;
$tiempoBloqueo = 10;

if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}

//include("guardar.php");
include("abre.php");
if (isset($_POST['correo']) && isset($_POST['contrasena'])) {

    function validar($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $correoL = validar($_POST['correo']);
    $contrasenaL = validar($_POST['contrasena']);

    $hashedPassword = password_hash($contrasenaL, PASSWORD_DEFAULT);

    if (empty($correoL)) {
        header('location: index.php?error=Ingrese correo de usuario');
        exit();
    } elseif (empty($contrasenaL)) {
        header('location: index.php?error=Ingrese contraseña');
        exit();
    } else {

        if (isset($_SESSION['bloqueo']) && time() - $_SESSION['bloqueo'] < $tiempoBloqueo) {
            $tiempoRestante = $tiempoBloqueo - (time() - $_SESSION['bloqueo']);
            header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoRestante . ' segundos.');
            exit();
        }

        $Sql = "SELECT * FROM signup WHERE correo = '$correoL'";
        $query = mysqli_query($conexion, $Sql);

        if ($query->num_rows == 1) {
            $correoQ = $query->fetch_assoc();

            $Nombre       = $NombreQ['Nombre'];
            $Apellidos    = $ApellidosQ['Apellidos'];
            $correo       = $correoQ['correo'];
            $contrasena   = $contrasenaQ['contrasena'];

            if ($correoL === $correo) {
                if (password_verify($contrasenaL, $contrasena)) {
                    $_SESSION['Nombre'] = $Nombre;
                    $_SESSION['Apellidos'] = $Apellidos;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['contraseña'] = $contrasena;

                    unset($_SESSION['intentos']);
                    // unset($_SESSION['bloqueo']);

                    header("Location: exito.php");
                }else {
                    if (isset($_SESSION['intentos'])) {
                        $_SESSION['intentos']++;
                    } else {
                        $_SESSION['intentos'] = 1;
                    }


                //
                    header('Location: index.php?error=Correo o contraseña incorrectos.');
                }
            } else {
                if (isset($_SESSION['intentos'])) {
                    $_SESSION['intentos']++;
                } else {
                    $_SESSION['intentos'] = 1;
                }

                if ($_SESSION['intentos'] >= $intentosPermitidos) {
                    $_SESSION['bloqueo'] = time();
                    header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoBloqueo . ' segundos.');
                    exit();
                }

                // echo "Error: " . $Sql . "<br>" . mysqli_error($conexion);
                header('Location: index.php?error=Correo o contraseña incorrectos.');
            }
        } else {
            if (isset($_SESSION['intentos'])) {
                $_SESSION['intentos']++;
            } else {
                $_SESSION['intentos'] = 1;
            }

            if ($_SESSION['intentos'] >= $intentosPermitidos) {
                $_SESSION['bloqueo'] = time();
                header('Location: error.php?errorI=Has excedido el número máximo de intentos. Inténtalo nuevamente en ' . $tiempoBloqueo . ' segundos.');
                exit();
            }


            header('Location: index.php?error=Correo o contraseña incorrectos.');

        }
    }
}
?>