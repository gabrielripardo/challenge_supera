@extends('templates.main')

@section('content')
  <div class="my-4">
    <h1 class="text-center">
      @if(isset($automovel)) 
        Edição de automóvel 
      @else 
        Cadastro de automóvel 
      @endif
    </h1>  
  </div>
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
      <div class="form-group m-2">
        <label for="tipo">Tipo</label>
        <select class="form-control" name="tipo" id="tipo" required>
          <option value="">Selecione</option>
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
      </div>
      <div class="form-group m-2">
        <label for="marca">Marca</label>
        <input class="form-control" type="text" name="marca" id="marca" placeholder="Marca" value="{{$automovel->marca ?? ''}}" required>
      </div>
      <div class="form-group m-2">
        <label for="modelo">Modelo</label>
        <input class="form-control" type="text" name="modelo" id="modelo" placeholder="Modelo" value="{{$automovel->modelo ?? ''}}" required>       
      </div>
      <div class="form-group m-2">
        <label for="versao">Versão</label>
        <input class="form-control" type="text" name="versao" id="versao" placeholder="Versão" value="{{$automovel->versao ?? ''}}">    
      </div>
      <div class="form-group my-4 mx-2">
        <input class="btn btn-primary" type="submit" value="@if(isset($automovel)) Editar @else Cadastrar @endif">                  
      </div>            
    </form>
  </div>  
@endsection