@extends('templates.main')

@section('content')
<div class="container">
  <h1 class="text-center mb-3">Visualização</h1>

  <div>
    Tipo: {{$tipo->nome}} <br>
    Marca: {{$automovel->marca}} <br>
    Modelo: {{$automovel->modelo}} <br>
    Versão: {{$automovel->versao}} <br>
    Autor: {{$user->name}} <br>    
  </div>
  
</div>
@endsection