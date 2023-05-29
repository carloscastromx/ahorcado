<?php 
    session_start();

    $server = "localhost";
    $user= "u976611399_5ZTre";
    $pass_bd = "fJSw8NDd";
    $bd = "u976611399_ahorcado";

    $conexion = new mysqli($server,$user,$pass_bd,$bd);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        } else {
            $consulta = "SELECT nombre, puntos FROM puntajes ORDER BY puntos DESC";
            $resultados = mysqli_query($conexion,$consulta);
            
            $filas = mysqli_fetch_all($resultados,MYSQLI_ASSOC);

            mysqli_free_result($resultados);
            mysqli_close($conexion);

        }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Puntuaciones</title>
    <link rel="stylesheet" href="../estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body class="body-tablero">
    <div class="contenedor">
        <h1>Tabla de Puntajes</h1>
        <div class="tabla-puntos">
            <div class="fila-tabla">
                <p class="encabezado-tabla">Nombre</p>
                <p class="encabezado-tabla">Puntos</p>
            </div>
            <?php foreach($filas as $fila){ ?>
                <div class="fila-tabla">
                    <p><?php echo $fila['nombre']; ?></p>
                    <p><?php echo $fila['puntos']; ?></p>
                </div>
            <?php }?>
        </div>
    </div>
</body>
</html>