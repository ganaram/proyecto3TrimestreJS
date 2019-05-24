<div class="form-group">
    <label for="name">Nombre de la Asignatura</label>
  <input  name="name" type="text" class="form-control" id="name" aria-describedby="asignaturaHelp" placeholder="Introduzca el nombre." value="{{ isset($asignatura)?$asignatura->name:old('name') }}"> 
  <div></div>
  </div>

    <div class="spinner-border invisible" role="status">
      <span class="sr-only"></span>
    </div>

  <div class="form-group">
  <label for="curso">Curso:</label>
  <select id="curso" name="curso" class="custom-select" >
        <option value="">Seleccione un curso..</option>
        <option value="1" {{ $asignatura->curso_id == 1 ? 'selected' : '' }}>Primero</option>
        <option value="2" {{ $asignatura->curso_id == 2 ? 'selected' : '' }}>Segundo</option>
        <option value="3" {{ $asignatura->curso_id == 3 ? 'selected' : '' }}>Tercero</option>
      </select>
      <div></div>
  </div>

  <div class="spinner-border invisible" role="status">
      <span class="sr-only"></span>
    </div>

  <div class="form-group">
  <label for="hours">Horas:</label>
  <input name="hours" type="text" class="form-control" id="hours" placeholder="Horas impartidas semanalmente de la asignatura." value="{{ isset($asignatura)?$asignatura->hours:old('hours') }}">
  <div></div>
  </div>

  <div class="spinner-border invisible" role="status">
      <span class="sr-only"></span>
    </div>

  <div class="form-group">
    <label for="description">Descripcción:</label>
    <input name="description" type="text" class="form-control" id="description" placeholder="Descripcion de la asignatura." value="{{ isset($asignatura)?$asignatura->description:old('description') }}">
    <div></div>
  </div>

  <div class="spinner-border invisible" role="status">
      <span class="sr-only"></span>
    </div>

<div class="modal fade" id="successForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Procesando</h5>
      </div>
      <div class="modal-body">
        Enviando información...
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
       </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successForm2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario enviado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalText"><strong>
      </strong>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="failForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Se ha producido un error al enviar el formulario, pruebe a rellenarlo de nuevo y corregir los errores.</h5>
      </div>
    </div>
  </div>
</div>