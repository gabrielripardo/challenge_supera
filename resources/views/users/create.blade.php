@extends('templates.main')

@section('content')
  <h1 class="text-center mb-3">
    @if(isset($user)) 
      Edição de Usuário 
    @else 
      Cadastro de Usuário
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
      
    @if (isset($user))
      <form name="formEditaUser" id="formEditaUser" method="POST" action="{{route('user.update', $user->id)}}">      
        @method('PUT')
    @else
      <form name="formCadastroUser" id="formCadastroUser" method="POST" action="{{route('user.store')}}">              
    @endif    
      @csrf      
      <input class="form-control" type="text" name="name" id="name" placeholder="Nome" value="{{$user->name ?? ''}}" required>
      <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" value="{{$user->email ?? ''}}" required>       
      <input type="password" name="password" id="password" placeholder="Senha">
      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirme a senha">
      <input class="btn btn-primary" type="submit" value="@if(isset($user)) Editar @else Cadastrar @endif">
    </form>
  </div>  
@endsection