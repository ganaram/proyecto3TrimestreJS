@extends('public.layout')



@section('content')
<form id="formTest" action="/asignaturas" method="post" enctype="multipart/form-data" novalidate data-accionAjax="crear"><br>

@csrf

@include('public.asignaturas.partials.form')

<button type="submit" class="btn btn-primary">Crear asignatura</button>

</form>
@endsection

@push('scripts')
<script src="{{ mix('/js/validarYCrear.js') }}" defer></script>
@endpush