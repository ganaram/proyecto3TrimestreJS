$(document).ready(function(){

    asociarEventos();

});

function asociarEventos(){
    $('#formTest').submit(function(event){
        event.preventDefault();
        validacionForm();
    });

    $("#mail").change(function(event){
        validacionEmail();

    })

    $("#pwd").change(function(event){
        validacionContra()
    })

    $("#terms").change(function(event){
        validacionCheckbox()
    })

    $("#selector").change(function(event){
        validacionSelect();
    })

    $("#age").change(function(event){
        validacionAge();
    })

    $().alert();

}


function validacionEmail(){

    var errors = [];

    let mail = $("#mail").val();

    let regex = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

    if(!regex.test(mail)){
        errors.push("The mail does not match our validation rules.");
    }

    let esCorrecto = imprimeErrores("#mail","#errorsMail",errors);

    return esCorrecto;

}

function validacionContra(){

    var errors = [];

    let pwd = $("#pwd").val();

    let regex = new RegExp(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/);

    if(!regex.test(pwd)){
        errors.push("Your password should contain eight characters, one letter and one number.")
    }

    let esCorrecto = imprimeErrores("#pwd","#errorsPwd",errors);

    return esCorrecto;
}

function validacionForm(){

    let errors = []

    $(txt).remove();

    let txt = `<span>Check your form and correct the errors.</span>`;

    let esEmailCorrecto = validacionEmail();
    let esAgeCorrecta = validacionAge();
    let esCheckboxCorrecto = validacionCheckbox();
    let esContraCorrecta = validacionContra();
    let esSelectCorrecto = validacionSelect();

    if(esAgeCorrecta && esCheckboxCorrecto && esContraCorrecta && esEmailCorrecto && esSelectCorrecto){
        $("formTest").submit();
        $('#successForm').modal('toggle')
    }else{
        $('#errorsForm').modal('toggle')
    }

}

function validacionSelect(){
    
    var errors = [];

    if($("#selector").val()===""){
        errors.push("You have to select an accout type.")
    }

    let esCorrecto = imprimeErrores("#selector","#errorsSelect",errors);

    return esCorrecto;

}

function validacionAge(){

    var errors = [];

    if($("#age").val()<18){
        errors.push("You have to be 18 or older.");
    }if(!$.isNumeric($("#age").val())){
        errors.push("You have to introduce a numeric value.")
    }

    let esCorrecto = imprimeErrores("#age","#errorsAge",errors);

    return esCorrecto;
}

function validacionCheckbox(){

    var errors = [];

    if(!$("#terms").is(":checked")){
        errors.push("You have to agree our terms.");
    }

    let esCorrecto = imprimeErrores("#terms","#errorsTerms",errors);

    return esCorrecto;
}

function imprimeErrores(campo,campoErrores, errors){
    let esCorrecto = false;
    $(campo).removeClass("is-valid is-invalid");
    $(campoErrores).empty();
    if(errors.length===0){
        $(campo).addClass("is-valid");
        $(campoErrores).removeClass("alert alert-danger");
        esCorrecto = true;
    }else{
        esCorrecto = false;
        $(campo).addClass("is-invalid");
        $(campoErrores).addClass("alert alert-danger");
        errors.forEach(error => $(campoErrores).append(`<span>${error}</span>`));
    }
    return esCorrecto;
}