<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'AcialLibraly') }}</title>

    <!-- Scripts bootstrap-->
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
     <a class="navbar-brand" href="#">AcialLibrary</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('display.show',[1]) }}">マイページ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">HTML</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Javassript</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">PHP</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">Laravel</a>
              </li>
         </ul>
     </div>
</nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
  @yield('content')