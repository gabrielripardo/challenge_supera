@extends('templates.main')

@section('content')
  <h1 class="text-center mb-3">
    @if(isset($automovel)) 
      Edição de automóvel 
    @else 
      Cadastro de automóvel 
    @endif
  </h1>  
  <div>    
    @if(isset($errors) && count($errors) > 0)
      <div class="text-center mt-4 mb-4 p-2 alert-danger">    
        @foreach ($errors->all() as $error)
          {{$error}} <br>
        @endforeach
      </div>
    @endif
      
    @if (isset($automovel))
      <form name="formEdita" id="formEdita" method="POST" action="{{route('automovel.update', $automovel->id)}}">      
        @method('PUT')
    @else
      <form name="formCadastro" id="formCadastro" method="POST" action="{{route('automovel.store')}}">      
        <input type="hidden" name="id_automovel" value="{{Auth::user()->id}}">
    @endif
    
      @csrf
      <select class="form-control" name="tipo" id="tipo" required>
        <option value="">Tipo</option>
        @foreach ($tipos as $item)
          <option value="{{$item->id}}" 
            @if (isset($automovel))
              @if($item->id == $automovel->id_tipo) 
                selected 
              @endif
            @endif>            
            {{$item->nome}} 
          </option>        
        @endforeach                
      </select>
      <input class="form-control" type="text" name="marca" id="marca" placeholder="Marca" value="{{$automovel->marca ?? ''}}" required>
      <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Modelo" value="{{$automovel->modelo ?? ''}}" required>       
      <input class="form-control" type="text" name="versao" id="versao" placeholder="Versão" value="{{$automovel->versao ?? ''}}">      
      <input class="btn btn-primary" type="submit" value="@if(isset($automovel)) Editar @else Cadastrar @endif">
    </form>
  </div>  
@endsection