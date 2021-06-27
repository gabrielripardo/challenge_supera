@extends('templates.main')

@section('content')
<div class="container">
  <h1 class="text-center mb-3">Cadastro de automóveis</h1>
  <nav>
      <ul>
          <li><a href="">Home</a></li>
          <li><a href="">Usuário</a></li>
          <li><a href="">Login</a></li>
      </ul>        
  </nav>
  <div>
    
      @if(isset($errors) && count($errors) > 0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">    
          @foreach ($errors->all() as $error)
            {{$error}} <br>
          @endforeach
        </div>
      @endif
    
    <form name="formCadastro" id="formCadastro" method="POST" action="{{route('automovel.store')}}">
      @csrf
      <select class="form-control" name="tipo" id="tipo" required>
        <option value="">Tipo</option>
        <option value="Carro">Carro</option>
        <option value="Moto">Moto</option>
        <option value="Caminhão">Caminhão</option>
      </select>
      <input class="form-control" type="text" name="marca" id="marca" placeholder="Marca" >
      <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Modelo" >       
      <input class="form-control" type="text" name="versao" id="versao" placeholder="Versão">      
      <input class="btn btn-primary" type="submit" value="Cadastrar">
    </form>
  </div>
  
</div>
@endsection