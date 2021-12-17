
<?php
    // Configuración BD
    $servidorbd = '127.0.0.1';
    $usuario = 'root';
    $contraseña = '';
    $basedatos = 'minijuegos';
    $conexion =  mysqli_connect($servidorbd, $usuario, $contraseña, $basedatos);
    
    $consultaExiste = "select * from usuarios where correo='".$_POST["correo"]."';";

    $resultado = mysqli_query($conexion, $consultaExiste);

    $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    if(!$fila){
        echo "Credenciales no válidas";
        header("refresh:3;url=login.html");
        echo "En 3 segundos vas a ser redirigido a la página de inicio de sesión";
    }
    else {
        if($fila["contrasena"]==$_POST["contrasena"]){
            echo "Sesión iniciada";
            session_start();
        }
    }

    
?>
