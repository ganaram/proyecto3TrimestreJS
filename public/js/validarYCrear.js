function creacionForm() {
  /**
    Pasamos los datos al enviar el formulario
   Abrimos un modal de carga
    En caso de que se cree el objeto devolvemos un modal de exito
    Si algo va mal, un modal de error.
    Además si se crea, podemos cerrar el modal y el formulario se vacía.
   */
  var datos = $('#formTest').serialize();
  $('#successForm').modal('toggle');
  axios.post('/crearAjax', datos).then(function (response) {
    $('#modalText strong').html("<span>Se ha creado la asignatura</span>");
    $('#successForm2').modal('show');
  }).catch(function (error) {
    $('#failForm').modal('show');
    console.log(error);
  }).then(function (response) {
    $('#successForm').modal('hide');
    $('#formTest')[0].reset();
  });
}

$(document).ready(function () {
  /**
   * Cuando abrimos la página iniciamos el JS.
   */
  asociarEventos();
});

function asociarEventos() {
  /**
   * Asímismo cuando ya estamos en la página asociamos el formulario
   * al evento de edición.
   */
  $('#name').change(function (event) {
    validarCampo(event.target);
  });
  $('#curso').change(function (event) {
    validarCampo(event.target);
  });
  $('#hours').change(function (event) {
    validarCampo(event.target);
  });
  $('#description').change(function (event) {
    validarCampo(event.target);
  });
  $('#formTest').submit(function (event) {
    event.preventDefault();
    validarFormulario(event.target);
  });
}

function validarCampo(input) {
  var datosPost = {};
  datosPost[input.name] = input.value;
  mostrarSpinner(input);
  axios.post('/validarAjax', datosPost).then(function (response) {
    tieneErrores(input, response.data[input.name]);
  }).catch(function (error) {
    console.log(error);
  }).then(function () {
    esconderSpinner(input);
  });
}

function tieneErrores(input, errores) {
  var hayErrores = false;
  var divErrores = $(input).next();
  divErrores.html("");
  $(input).removeClass("is-invalid is-valid");
  /*Si es undefined o esta vacío, 
  significa que no hay errores en dicho campo*/

  if (errores === undefined || errores.length === 0) {
    $(input).addClass("is-valid");
  } else {
    hayErrores = true;
    $(input).addClass("is-invalid");
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        var error = _step.value;
        divErrores.append("<div>".concat(error, "</div>"));
      }
    } catch (err) {
      _didIteratorError = true;
      _iteratorError = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion && _iterator.return != null) {
          _iterator.return();
        }
      } finally {
        if (_didIteratorError) {
          throw _iteratorError;
        }
      }
    }
  }

  return hayErrores;
}

function mostrarSpinner(input) {
  $(input).parent().next().removeClass("invisible");
}

function esconderSpinner(input) {
  $(input).parent().next().addClass("invisible");
}

function validarFormulario(form) {
  var datosPost = $(form).serialize();
  var accion = $(form).attr("data-accionAjax");
  axios.post('/validarAjax', datosPost).then(function (response) {
    var formularioCorrecto = true;

    if (response.data !== undefined) {
      for (campo in response.data) {
        var input = document.getElementsByName(campo)[0];

        if (tieneErrores(input, response.data[campo])) {
          formularioCorrecto = false;
        }
      }
    }

    if (formularioCorrecto) {
      switch (accion) {
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
  }).then(function () {
    console.log("termino");
  });
}
