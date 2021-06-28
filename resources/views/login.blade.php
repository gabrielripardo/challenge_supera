<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <title>Login</title>
</head>
<body>    
    <div class="container">
        <h1>Login</h1>
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif        
        <form action="{{route('auth.user')}}" method="post">
            @csrf   
            <input class="form-control mb-3" type="text" name="email" id="email" placeholder="E-mail" >
            <input class="form-control mb-3" type="password" name="password" id="password" placeholder="Senha">
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>
    
</body>
</html>