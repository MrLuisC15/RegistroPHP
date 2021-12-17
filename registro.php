<!DOCTYPE html>
<?php
    // Configuración BD
    $servidorbd = '127.0.0.1';
    $usuario = 'root';
    $contraseña = '';
    $basedatos = 'minijuegos';
    $conexion =  mysqli_connect($servidorbd, $usuario, $contraseña, $basedatos);
    $consultaSelect = 'select * from juegos;';

?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz"
        crossorigin="anonymous">
        <link rel="stylesheet" href="./estilo.css">
    </head>
    <body>
    <div class="login-box">
        <h2>Registro de usuario</h2>
        <form action="registrosiguiente.php" method="POST">
            <div class="user-box">
                <input type="text" name="nombre" required="">
                <label for="nombre">Nombre:</label>
            </div>
            <div class="user-box">
                <input type="email" name="correo" required="">
                <label>Correo:</label>
            </div>
            <div class="user-box">
                <input type="password" name="contrasena" required="">
                <label>Contraseña:</label>
            </div>
            <div class="user-box">
                <label>Preferencias:</label>
            </div><br />
            <div class="preferencias">
                <ul class="ks-cboxtags">
                    <?php
                        $resultado = mysqli_query($conexion, $consultaSelect);
                        $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                        
                        
                        while($fila){
                            echo '<li>';
                            echo '<input type=checkbox name=cb'.$fila["nombre"].' value='.$fila["idJuego"].' id='.$fila["idJuego"].'>';
                            echo '<label for='.$fila["idJuego"].' >'.$fila["nombre"].'</label>';
                            echo '</li>';

                            $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                        }

                    ?>
                </ul>
            </div>
            
            <input type="reset" class="boton">
            <input type="submit" value="Registro" class="boton">
        </form>
    </body>
</html>






