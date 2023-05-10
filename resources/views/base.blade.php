<!-- template file -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') | Liste de mots rares</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

        <style>
            @layer demo {
                button {
                    all: unset
                }
            }
        </style>
    </head>
    
    <body>

        @php
            $currentRoute = request()->route()->getName();
        @endphp

        <nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Mots rares</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <!-- @class = classe conditionnelle -->
                    <a 
                        @class(['nav-link', 'text-sm-center', 'active' => $currentRoute === 'liste.index'])
                        class="nav-link active text-sm-center" 
                        aria-current="page" 
                        href="{{ route('liste.index') }}"
                    >Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a 
                      class="nav-link text-sm-center" 
                      href="{{ route('liste.create') }}"
                      @class(['nav-link', 'active' => $currentRoute === 'liste.create'])
                    >Ajouter un mot</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link text-sm-center" 
                      href="{{ route('showTodayWord') }}" 
                      @class(['nav-link', 'active' => $currentRoute === 'showTodayWord'])
                    >Mot du jour</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        <div class="container">

            @if (session('success'))
              <!-- notification de succès d'un ajout de mot -->
              <div class="alert alert-success my-5">
                {{ session('success') }}
              </div>
            @endif

            <!-- personalized content -->
            @yield('content')

        </div>
    </body>
</html>