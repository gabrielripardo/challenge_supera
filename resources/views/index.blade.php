@extends('templates.main')

@section('content')
<div class="container">
  <h1 class="text-center mb-3">Página Home</h1>
  
  <div class="text-end mt-2 mb-3">
    <a href="{{route('automovel.create')}}">
      <button class="btn btn-success">Cadastrar</button>
    </a>
  </div>
  
  <table class="table m-auto">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tipo</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Versão</th>
        <th scope="col">Autor</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($automoveis as $automovel)      
        @php
          $user = $automovel->find($automovel->id)->relUsers;     
          $tipo = $automovel->find($automovel->id)->relTipos
        @endphp 
        <tr>    
          <th>{{$automovel->id}}</th>
          <td>{{$tipo->nome}}</td>
          <td>{{$automovel->marca}}</td>
          <td>{{$automovel->modelo}}</td>
          <td>{{$automovel->versao}}</td>
          <td>{{$user->name}}</td>          
          <td>          
            <a href="{{route('automovel.show', $automovel->id)}}">
              <button class="btn btn-secondary">Visualizar</button>
            </a>
            <a href="{{route('automovel.edit', $automovel->id)}}">
              <button class="btn btn-primary">Editar</button>
            </a>
            
            <button class="btn btn-danger">Deletar</button>
          </td>
      </tr>
      @endforeach       
    </tbody>
  </table>
</div>
@endsection