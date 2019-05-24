function creacionForm(){

    /**
      Pasamos los datos al enviar el formulario
     Abrimos un modal de carga
      En caso de que se cree el objeto devolvemos un modal de exito
      Si algo va mal, un modal de error.
      Además si se crea, podemos cerrar el modal y el formulario se vacía.
     */
    
    let datos = $('#formTest').serialize();
    $('#successForm').modal('toggle');
    axios.post('/crearAjax',datos)
    .then(function(response){
        $('#modalText strong').html(`<span>Se ha creado la asignatura</span>`);
        $('#successForm2').modal('show');
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