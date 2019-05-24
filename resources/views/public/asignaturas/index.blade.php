@extends('public.layout')

@section('title','Asignaturas')

@section('content')

<h1> Listado de Asignaturas </h1>

<div class="d-flex justify-content-center">
        {{ $asignaturas->links() }}
</div>

@forelse($asignaturas as $asignatura)
<div class="card border-primary mb-3" data-asignatura="{{ $asignatura->id }}">
  <div class="card-header bg-dark">

  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $asignatura->name }}</h5>
    <p class="card-text font-weight-bold">{{ $asignatura->hours}} horas semanales</p>
    <p class="card-text">{{$asignatura->description}}</p>
    <div class="btn-group float-right" role="group">
    <a href="#" class="btn btn-primary">Mostrar</a>
    <a href="/asignaturas/{{ $asignatura->id }}/edit" class="btn btn-warning">Editar</a>
    <Button id="delete" class="btn btn-danger" data-accion='delete' data-asignatura="{{ $asignatura->id }}">Borrar</button>
    </div>
  </div>
</div>

@empty
<p>No hay asignaturas en la BDD.</p>
@endforelse

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label">Confirmación</h5>
      </div>
      <div class="modal-body">
          <p><strong>¿Está seguro de querer borrar esta asignatura?</strong></p>
            <div class="btn-group float-right" role="group">
              <button id="yes" type="submit" class="btn btn-danger" data-asignatura="">Sí </button>
              <button id="no" type="submit" class="btn btn-secondary">No</button>
            </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label">Borrado exitoso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalText">

    </div>
  </div>
</div>
</div>

@endsection

@push('scripts')
<script src="{{ mix('/js/delete.js') }}" defer ></script>ç
<script src="{{ mix('js/show.js') }}" defer></script>
@endpush