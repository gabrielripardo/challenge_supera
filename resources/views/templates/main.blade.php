<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dicas para Automóveis</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{route('automovel.index')}}">Home</a></li>
                <li><a href="{{route('users.index')}}">Usuários</a></li>
                @if (Auth::check())
                    <li><a href="{{route('automovel.mydicas', Auth::user()->id) }}">Minhas Dicas</a></li>
                    <li><a href="{{route('logout')}}">Logout on {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} </a></li>    
                @else
                    <li><a href="{{route('login.page')}}">Login</a></li>
                @endif                                
            </ul>        
        </nav>
        @yield('content')    
       
    </div>    
</body>
</html>