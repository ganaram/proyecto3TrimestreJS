$(document).ready(function(){
    /**
     * Cuando abrimos la página iniciamos el JS.
     */
    asociarEventos();
});

function asociarEventos(){

    /**
     * Asímismo cuando ya estamos en la página asociamos el formulario
     * al evento de borrado.
     */
    $("button[data-accion='delete']").click(function(event){
        event.preventDefault();
        borrarElemento();

    });

    $('#no').click(function(event){
        event.preventDefault();
        noBorra();
    })

    $('#yes').click(function(event){
        event.preventDefault();
        siBorra();
    })
};

function borrarElemento(){
    /**
     * Evento asociado al boton de borrar para mostrar el modal de borrado.
     */
    let boton =$(event.target);
    let asignatura = boton.attr("data-asignatura");
    $('#yes').attr("data-asignatura",asignatura);
    $('#deleteModal').modal('toggle');
}

function siBorra(){
    let asignatura = $('#yes').attr("data-asignatura");
    axios.delete(`/borrarAjax/${asignatura}`)
    .then(function(response){
        $('#deleteModal').modal('toggle');
        $('#modalText strong').html(`<span>${response.data}</span>`);
        $('#successModal').modal('show');
        
        $(`div[data-asignatura='${asignatura}']`).fadeOut();
    })
    .catch(function(error){
        $('#failForm').modal('show');
        console.log(error);
    })
    .then(function(response){
        $('#successForm').modal('hide');
        $('#formTest')[0].reset();
    });
}

function noBorra(){
    $('#deleteModal').modal('toggle');
}