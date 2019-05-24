$(document).ready(function(){

    asociarEventos();

});

function asociarEventos(){
    $('#formTest').submit(function(event){
        event.preventDefault();
        validacionForm();
    });
}

function validacionForm(){
    
    let datos = $('#formTest').serialize();
    $('#successForm').modal('toggle');
    axios.post('/crearAjax',datos)
    .then(function(response){
        $('#successForm').modal('hide');
        $('#successForm2').modal('show');
        $('#modalText').append(`<span>${response.data}</span>`)
    });
}