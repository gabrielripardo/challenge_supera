<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dicas para Automóveis</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <script src="{{ url('assets/bootstrap-5.0.2-dist/js/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
            <a class="navbar-brand" href="{{url("/")}}">Automóveis Dicas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="col navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{{ isset($automoveis) && !isset($id) ? "active":""}}}" href="{{route('automovel.index')}}">Home </a>
                </li>
                <li class="nav-item">
                @if (Auth::check())
                  <a class="nav-link {{{ isset($automoveis) && isset($id) ? "active":""}}} " href="{{route('automovel.mydicas', Auth::user()->id) }}">Minhas Dicas</a>
                @endif
                </li>
                <li class="nav-item">
                  <a class="nav-link {{{ isset($users) ? "active":""}}}" href="{{route('users.index')}}">Usuários</a>
                </li>                   
              </ul>
              
                <ul class="navbar-nav">                
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                      
                                <a class="dropdown-item" href="#">Conta</a>
                                <a class="dropdown-item" href="{{route('logout')}}">Sair</a>
                            </div>
                        </li>             
                    @else
                        <li class="nav-item" >
                            <a class="nav-link" href="{{route('login.page')}}">Login</a>
                        </li>
                    @endif                                        
                </ul>              
            </div>
        </nav>   

        {{-- <nav>
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
        </nav>  --}}
        @yield('content')    
       
    </div>    
</body>
</html>