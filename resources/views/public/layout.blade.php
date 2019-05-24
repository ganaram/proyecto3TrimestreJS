<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PcCompuestos')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('/js/app.js') }}" defer></script>

    <link href="{{ asset('/css/app.css') }} " rel="stylesheet">
    @stack('estilos')
    @stack('scripts')
  </head>
  <body>
    <div id="app">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">PcComponidos</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{route('asignaturas.index') }}">Asignaturas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('asignaturas.create') }}">Crear Asignatura</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          </nav>
    @yield('content')
    </div>
</div>
  </body>
</html>
