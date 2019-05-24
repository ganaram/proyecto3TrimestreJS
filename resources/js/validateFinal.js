$(document).ready(function(){
    /**
     * Cuando abrimos la página iniciamos el JS.
     * De paso como tenemos crear y editar en el mismo archivo
     * no necesitamos iniciarlo en los otros .js
     */
    asociarEventos();

})

function asociarEventos(){
    /**
     * Asímismo cuando ya estamos en la página asociamos el formulario
     * al evento de edición.
     */
    $('#name').change(function(event){
        validarCampo(event.target);
    });

    $('#curso').change(function(event){
        validarCampo(event.target);
    });

    $('#hours').change(function(event){
        validarCampo(event.target);
    });

    $('#description').change(function(event){
        validarCampo(event.target);
    });

    $('#formTest').submit(function(event){
        event.preventDefault();
        validarFormulario(event.target);
    });

}

function validarCampo(input){
    //FUncion para validar ayudandonos de nuestro controlador
    let datosPost = {};
    datosPost[input.name] = input.value; 
    mostrarSpinner(input);
    axios.post('/validarAjax',datosPost)
    .then(function(response){
        tieneErrores(input,response.data[input.name]);
    }).catch(function (error) {
        console.log(error);
    }).then(function(){
        esconderSpinner(input);
    });
}

function tieneErrores(input,errores){
    //Creamos el div para los errores.
    let hayErrores = false;
    let divErrores = $(input).next();
    divErrores.html("");
    $(input).removeClass("is-invalid is-valid");

    /*Si es undefined o esta vacío, 
    significa que no hay errores en dicho campo*/
    if (errores === undefined || errores.length === 0) {
        $(input).addClass("is-valid");
    } else {
        hayErrores = true;
        $(input).addClass("is-invalid");
        for (let error of errores) {
            divErrores.append(`<div>${error}</div>`);
        }
    }
    return hayErrores;
}



function mostrarSpinner(input){
    $(input).parent().next().removeClass("invisible");
}

function esconderSpinner(input){
    $(input).parent().next().addClass("invisible");
}

function validarFormulario(form){
    let datosPost = $(form).serialize();
    let accion = $(form).attr("data-accionAjax");
    axios.post('/validarAjax',datosPost)
    .then(function(response){
        let formularioCorrecto = true;

        if(response.data !== undefined){
            for(campo in response.data){
                let input = document.getElementsByName(campo)[0];
                if(tieneErrores(input,response.data[campo])){
                    formularioCorrecto = false;
                }
            }    
        }
        if(formularioCorrecto){
            switch(accion){
                case "crear":
                        creacionForm();
                        break;
                case "editar":
                        editForm();
                        break;
                default:
                        console.log("Tas liao shur.");
            }
        }
    }).catch(function (error) {
        console.log(error);
    }).then(function(){
        console.log("termino");
});

}