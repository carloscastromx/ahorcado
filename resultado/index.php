<?php
    session_start();

    if(!isset($_SESSION['usuario']) || !isset($_GET['puntos'])){
        header("location: https://ahorcado.wolfate.com/tablero/");
    }

    if(isset($_SESSION['usuario']) && isset($_GET['puntos'])){
        $puntuacion = intval($_GET['puntos']);
        $nombre = $_SESSION['usuario'];

        if($puntuacion == 0){
            $resultado = "Perdiste :(";
        } else {
            $resultado = "¡Ganaste!";
        }

        $server = "localhost";
        $user= "u976611399_5ZTre";
        $pass_bd = "fJSw8NDd";
        $bd = "u976611399_ahorcado";

        $conexion = new mysqli($server,$user,$pass_bd,$bd);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        } else {
            if($puntuacion != 0){
                $sql = "INSERT INTO puntajes(nombre, puntos)
                VALUES('$nombre', '$puntuacion')";
                $datos = mysqli_query($conexion,$sql);

                if($datos == false){
                    die(mysqli_error($conexion));
                }
        
                mysqli_free_result($datos);
                mysqli_close($conexion);
            }
        }
    }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resultado; ?></title>
    <link rel="stylesheet" href="../estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
        <h1><?php echo $resultado; ?></h1>
        <p style="margin: 20px 0;">Puntos obtenidos: <?php echo $puntuacion; ?></p>
        <a href="../tablero/" style="color: #364935;">Ver tabla de puntuación</a>
    </div>
</body>
</html>