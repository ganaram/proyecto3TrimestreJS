@extends('public.layout')

@section('title', 'Actualizar asignatura')

@section('content')
<form data-asignatura="{{ $asignatura->id }}" id="formTest" action="/asignaturas/{{ $asignatura->id }}" method="post" enctype="multipart/form-data" novalidate data-accionAjax="editar">
    @csrf

    @include('public.asignaturas.partials.form')

 <button type="submit" class="btn btn-primary">Actualizar Asignatura</button>
     
</form>
@endsection


@push('scripts')
<script src="{{ mix('/js/validarYEditar.js') }}" defer></script>
@endpush