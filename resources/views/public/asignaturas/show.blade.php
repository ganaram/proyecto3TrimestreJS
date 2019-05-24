@extends('public.layout')

@section('title','Información sobre la asignatura')

@section('content')

<div class="card text-center">
  <div class="card-header">
    Información de la asignatura
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$asignatura->name}}</h5>
    <hr>
    <p class="card-text">{{$asignatura->description}}</p>
    <a href="{{route('asignaturas.index') }}" class="btn btn-primary">Volver a la lista</a>
  </div>
  <div class="card-footer text-muted">
  {{ $asignatura->hours}} horas semanales.
  </div>
</div>

    @endsection

