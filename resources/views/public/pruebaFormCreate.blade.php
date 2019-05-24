@extends('public.layout')
@section('content')
<form id="formTest" method="post">
<br>

<div class="form-group">
    <label for="nombre">Nombre de la Asignatura</label>
    <input name="nombre" type="text" class="form-control" id="nombre" aria-describedby="asignaturaHelp" placeholder="Introduzca el nombre.">
  </div>

  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input name="codigo" type="text" class="form-control" id="codigo" placeholder="Escriba el código identificador de la asignatura.">
  </div>

  <div class="form-group">
  <label for="selector">Curso:</label>
  <select id="selector" name="selector" class="custom-select">
        <option value=""selected>Seleccione un curso..</option>
        <option value="primero">Primero</option>
        <option value="segundo">Segundo</option>
        <option value="tercero">Tercero</option>
      </select>
  </div>

  <div class="form-group">
    <label for="desc">Descripcción:</label>
    <input name="desc" type="text" class="form-control" id="desc" placeholder="Descripccion de la asignatura.">
    <small class="form-text text-muted">Recuerde introducir un mínimo de caracteres para proporcionar la suficiente información sobre la misma.</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

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
        <h5 class="modal-title" id="exampleModalLabel">Se ha producido un error inesperado, pruebe en unos minutos. En caso de que persista contacte con el administrador.</h5>
      </div>
    </div>
  </div>
</div>

</form>
@endsection

@push('scripts')
<script src="{{ mix('/js/create.js') }}" defer></script>
@endpush