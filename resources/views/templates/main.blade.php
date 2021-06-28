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
    <nav>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="">Usuário</a></li>
            <li><a href="{{route('login.page')}}">Login</a></li>
        </ul>        
    </nav>
    @yield('content')   
    
    <script src="{{url("assets/js/deleteAction.js")}}"></script>
</body>
</html>