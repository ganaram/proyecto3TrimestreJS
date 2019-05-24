function editForm(){


    /**
     * Similar a la creación, tomando los datos ademas del
     * atributo data-asignatura y con la funcion put
     * de axios el ID de la asignatura, pasando los 
     * nuevos datos y repitiendo el proceso de creación.
     */
    let datos = $('#formTest').serialize();
    let asignatura = $('#formTest').attr("data-asignatura");
    $('#successForm').modal('toggle');
    axios.put(`/editarAjax/${asignatura}`,datos)
    .then(function(response){
        $('#modalText strong').html(`<span>${response.data}</span>`);
        $('#successForm2').modal('show');
    })
    .catch(function(error){
        $('#failForm').modal('show');
        console.log(error);
    })
    .then(function(response){
        $('#successForm').modal('hide');
    });

}