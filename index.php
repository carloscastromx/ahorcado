<?php
    session_start();

?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Ahorcado</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
        <p class="error-user" style="color:red;margin-bottom:20px;<?php 
            if(!isset($_GET['error'])){
                echo "display: none;";
            }
        ?>"><?php 
            if(isset($_GET['error'])){
                echo $_GET['error'];
            }
        ?></p>
        <h1>Juego del Ahorcado</h1>
        <p class="txt-inicio">Ingresa tu nombre para que podamos registrar tu puntaje en nuestro tablero de puntuaciones.</p>
        <form class="form-registro">
            <input type="text" id="input-nombre" placeholder="Nombre" name="nombre">
            <p class="error-txt"></p>
            <button id="btn-iniciar">Jugar</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $(".form-registro").submit(function(){
                return false;
            });
            $("#btn-iniciar").on('click', function(){
                var nombre = $("#input-nombre").val();
                if(nombre == ""){
                    $(".error-txt").append("Ingresa tu nombre")
                    $(".error-txt").css({"display": "block", "color": "red"});
                } else {
                    $(".error-txt").empty()
                    $(".error-txt").css("display","none");
                    window.location.href = "/jugar/?nombre="+nombre;
                }
            });
        });
    </script>
</body>
</html>