@extends('templates.main')
@extends('templates.model')

@section('content')
<div class="my-4">
  <h1 class="text-center mb-3">Visualização</h1>
</div>  
  <div class="row">
    <div class="col text-right">
      <div class="shadow-sm p-3 mb-5 bg-gray rounded"><span style="font-size: 1.3em;" >Tipo:</span></div>      
    </div>
    <div class="col-8">
      <div class="shadow p-3 mb-5 bg-white rounded font-weight-bold"><span style="font-size: 1.6em;" >{{$tipo->nome}}</span></div>
    </div>
  </div>  

  <div class="row">
    <div class="col text-right">
      <div class="shadow-sm p-3 mb-5 bg-gray rounded"><span style="font-size: 1.3em;" >Marca:</span></div>      
    </div>
    <div class="col-8">
      <div class="shadow p-3 mb-5 bg-white rounded font-weight-bold"><span style="font-size: 1.6em;" >{{$automovel->marca}}</span></div>
    </div>
  </div>  
  <div class="row">
    <div class="col text-right">
      <div class="shadow-sm p-3 mb-5 bg-gray rounded"><span style="font-size: 1.3em;" >Modelo:</span></div>      
    </div>
    <div class="col-8">
      <div class="shadow p-3 mb-5 bg-white rounded font-weight-bold"><span style="font-size: 1.6em;" >{{$automovel->modelo}}</span></div>
    </div>
  </div>  
  <div class="row">
    <div class="col text-right">
      <div class="shadow-sm p-3 mb-5 bg-gray rounded"><span style="font-size: 1.3em;" >Versão:</span></div>      
    </div>
    <div class="col-8">
      <div class="shadow p-3 mb-5 bg-white rounded font-weight-bold"><span style="font-size: 1.6em;" >{{$automovel->versao}}</span></div>
    </div>
  </div>  
  <div class="row">
    <div class="col text-right">
      <div class="shadow-sm p-3 mb-5 bg-gray rounded"><span style="font-size: 1.3em;" >Autor:</span></div>      
    </div>
    <div class="col-8">
      <div class="shadow p-3 mb-5 bg-white rounded font-weight-bold"><span style="font-size: 1.6em;" >{{$user->name}}</span></div>
    </div>
  </div>    
  
  @if(Auth::check())
    @if ($automovel->id_user == Auth::user()->id)
      <a href="{{route('automovel.edit', $automovel->id)}}">
        <button class="btn btn-primary">Editar</button>
      </a>                  
      <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteConfirm">Deletar</button>                                  
    @endif
  @endif  
@endsection