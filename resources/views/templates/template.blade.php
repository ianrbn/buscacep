<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('vendors/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <title>BuscaCEP</title>
</head>

<body>
    <div class="app-bg"></div>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <a href="{{ URL::to('/') }}" class="navbar-brand">{{ config('app.name') }}</a>
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('ceps.list') }}" class="nav-link">Lista de CEP</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ceps.create') }}" class="nav-link">Novo CEP</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesquisa.cep') }}" class="nav-link">Pesquisa Vue.js</a>
                    </li>
                </ul>

                <form class="d-flex" role="search" method="GET" action="{{ route('ceps.list') }}">
                    <input class="form-control me-2" name="search" type="text" placeholder="" value="{{ request()->search }}">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="p-4">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('vendors/bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>