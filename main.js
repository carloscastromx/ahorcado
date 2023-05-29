String.prototype.reemplazar=function(index, caracter){
    return this.substr(0,index) + caracter + this.substr(index+caracter.length);
}

const palabras = ['idiosincrasia', 'caleidoscopio', 'herencia', 'agotado', 'camioneta', 'caballo', 'cargador', 'tacos', 'escritorio', 'habitacion'];
const puntajes = [100, 100, 50, 50, 50, 30, 30, 30, 30, 30];

var aleatorio = Math.floor(Math.random() * palabras.length)

const palabra = palabras[aleatorio];
const puntos = puntajes[aleatorio];

var guiones = palabra.replace(/./g, "_ ");

$("h2.acompletar").empty();
$("h2.acompletar").append(guiones);

var fallos = 0;

$("#validar-letra").on('click', function(){
    const letra = $("#input-letra").val();
    let error = true;
    for(const i in palabra){
        if(letra == palabra[i]){
            guiones = guiones.reemplazar(i*2, letra);
            $("h2.acompletar").empty();
            $("h2.acompletar").append(guiones);
            error = false;
        }
    }

    $("#input-letra").val('');
    $("#input-letra").focus();

    if(error){
        fallos++;
        var imagen = document.querySelector(".ahorcado-img");
        switch(fallos){
            case 1:
                imagen.setAttribute("src", "../img/img-paso2.png");
                puntos = puntos - 1;
                break;
            case 2:
                imagen.setAttribute("src", "../img/img-paso3.png");
                puntos = puntos - 2;
                break;
            case 3:
                imagen.setAttribute("src", "../img/img-paso4.png");
                puntos = puntos - 3;
                break;
            case 4:
                imagen.setAttribute("src", "../img/img-final.png");
                window.location.href = "/resultado/?puntos=0";
                break;
        }
    } else {
        if(guiones.indexOf('_') < 0){
            window.location.href = "/resultado/?puntos="+puntos;
        }
    }
});