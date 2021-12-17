
<?php
    // Configuración BD
    $servidorbd = '127.0.0.1';
    $usuario = 'root';
    $contraseña = '';
    $basedatos = 'minijuegos';
    $conexion =  mysqli_connect($servidorbd, $usuario, $contraseña, $basedatos);


    $contadorCB = 0;
    $arrayCB = [];

    foreach ($_POST as $key => $value) {
        if($key=="nombre"){
            $nombre=$value;
        }
        else {
            if($key=="correo"){
                $correo=$value;
            }
            else{
                if($key=="contrasena"){
                    $contrasena=$value;
                }
                else{
                    $arrayCB[$contadorCB]=$value;
                    $contadorCB++;
                }
            }
        }
    }
    
    $consultaInsertarUsuario = "insert into usuarios(correo, nombre, contrasena) values('".$correo."', '".$nombre."', '".$contrasena."');";

    if ($resultado = mysqli_query($conexion, $consultaInsertarUsuario)) { 
        $consultaUsuario= "select idUsuario from usuarios where correo='".$correo."';";
   
        $resultado = mysqli_query($conexion, $consultaUsuario);
    
        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        for($i=0;$i<count($arrayCB);$i++){
            $consultaCB="insert into preferencias(idUsuario, idJuego) values(".$fila["idUsuario"].",".$arrayCB[$i].");";
            mysqli_query($conexion, $consultaCB);
        }

        echo "<h1>Cuenta creada con éxito, inicia sesión para acceder</h1>";
        header("refresh:5;url=login.html");
        echo "En 5 segundos vas a ser redirigido a la página de inicio de sesión";
    } 
    else{ 
        echo "<h1>El correo utilizado ya existe en el sistema</h1>";
        header("refresh:5;url=registro.php");
        echo "Vas a volver al registro en 5 segundos...";
    }


    

    


?>