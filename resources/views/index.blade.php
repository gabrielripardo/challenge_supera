@extends('templates.main')
@extends('templates.model')

@section('content')
  <div class="row">
    <div class="col-auto p-3">
      @if (isset($id))
        @if ($id == Auth::user()->id)
          <h1 class="text-center mb-3">Minhas dicas</h1>                  
        @endif    
      @else
        <h1 class="text-center mb-3">Página Home</h1>  
      @endif    
    </div>    
    @if (Auth::check())  
      <div class="col text-end py-3">
        <a href="{{route('automovel.create')}}">
          <button class="btn btn-success">Add Dica</button>
        </a>
      </div>      
  @endif    
  </div>
    
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @elseif ($message = Session::get('danger'))
      <div class="alert alert-danger">
        <p>{{ $message }}</p>
      </div>
  @endif
  <div class="filtro">    
    <form class="row" action="{{ route('automovel.search') }}" method="post">
      @csrf
      @if (isset($id))        
        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">        
      @endif
      <div class="col-4">
        <input class="form-control" type="text" name="keyword" placeholder="Filtro:">
      </div>
      <div class="col">
        <input class="btn btn-primary" type="submit" value="Filtrar">
      </div>                  
    </form>  
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

            @if (isset($id))  
              @if ($id == Auth::user()->id)
                <a href="{{route('automovel.edit', $automovel->id)}}">
                  <button class="btn btn-primary">Editar</button>
                </a>                  
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteConfirm">Deletar</button>                                  
              @endif
            @endif
          </td>
      </tr>
      @endforeach       
    </tbody>
  </table>
  <div class="pagination justify-content-center m-4">    
    @if (isset($filters))
      {{ $automoveis->appends($filters)->links()}}
    @else
      {{$automoveis->links()}}
    @endif
  </div>
@endsection