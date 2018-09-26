<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Departamento de Adquisiones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
    <div class="">
        <nav class="navbar navbar-expand-sm bg-info navbar-dark">
                <a class="navbar-brand" href="{{ route('Home') }}">
                        <i class="fas fa-home"></i>
                </a>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('SucursalController@index') }}">Ver Sucursales</a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="{{ action('ProveedorController@index') }}">Ver Proveedores</a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="{{ action('BodegaController@index') }}">Ver Bodegas</a>
                </li>
                <li class="nav-item active">
                        <a class="nav-link" href="{{ action('ProductoController@index') }}">Ver Productos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ action('StockController@index') }}">Ver Stock</a>
                </li>
            </ul>
         </nav>
    </div>
    @yield('content')
</body>
</html>
