@extends('templates.main')

@section('content')
  <div class="my-4">
    <h1 class="text-center">
      @if(isset($user)) 
        Edição de Usuário 
      @else 
        Cadastro de Usuário
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
      
    @if (isset($user))
      <form name="formEditaUser" id="formEditaUser" method="POST" action="{{route('user.update', $user->id)}}">      
        @method('PUT')
    @else
      <form name="formCadastroUser" id="formCadastroUser" method="POST" action="{{route('user.store')}}">              
    @endif    
      @csrf    
      <div class="row">
        <div class="form-group my-2">
          <label for="inputAddress">Nome</label>
          <input class="form-control" type="text" name="name" id="name" placeholder="Nome" value="{{$user->name ?? ''}}" required>
        </div>
        <div class="form-group my-2">
          <label for="inputAddress">Email</label>
          <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" value="{{$user->email ?? ''}}" required>       
        </div>
        <div class="col-6 my-2">
          <label for="inputEmail4">Senha</label>
          <input class="form-control" type="password" name="password" id="password" placeholder="Sua senha" required>
        </div>
        <div class="col my-2">
          <label for="inputPassword4 ">Cofirma a senha</label>
          <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirme a senha" required>
        </div>
        <div class="form-group my-2">
          <input class="btn btn-primary" id="btnSubmit" type="submit" value="@if(isset($user)) Editar @else Cadastrar @endif">
        </div>        
      </div>                                          
    </form>
  </div>  
  <script>
    $(function () {
      $("#btnSubmit").click(function (e) {
          var password = $("#password").val();
          var confirmPassword = $("#confirm_password").val();
          console.log(password+" | "+confirmPassword )
          if (password != confirmPassword) {
            alert("As senhas devem ser iguais.");       
            return false;                     
          }else{
            return true;
          }          
      });
    });
  </script>
@endsection
