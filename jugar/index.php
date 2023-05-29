<?php
    session_start();

    if(!isset($_GET['nombre'])){
        header("location: https://ahorcado.wolfate.com/?error=Debes ingresar tu nombre para poder jugar");
    }

    if(isset($_GET['nombre'])){
        $_SESSION['usuario'] = $_GET['nombre'];
    }
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
    <link rel="stylesheet" href="../estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
        <p>Ingresa una letra y haz click en el boton para validar</p>
        <div class="rows-2">
            <div class="inputs-juego">
                <input type="text" id="input-letra" maxlength="1">
                <button id="validar-letra">Validar</button>
            </div>
            <img class="ahorcado-img" src="../img/img-inicial.png">
        </div>
        <h2 class="acompletar"></h2>
    </div>
    <script src="../main.js"></script>
</body>
</html>