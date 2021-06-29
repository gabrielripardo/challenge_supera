@extends('templates.main')

@section('content')
  <h1 class="text-center mb-3">Usuários</h1>  
  <div class="text-end mt-2 mb-3">
    <a href="{{route('user.create')}}">
      <button class="btn btn-success">Cadastrar</button>
    </a>
  </div>
  {{-- <div class="filtro">    
    <form class="row" action="{{ route('user.search') }}" method="post">
      @csrf
      <div class="col">
        <input class="form-control" type="text" name="keyword" placeholder="Filtro:">
      </div>
      <div class="col-2 text-right">
        <input class="btn btn-primary" type="submit" value="Filtrar">
      </div>                  
    </form>  
  </div> --}}
  <table class="table m-auto">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>        
        <th scope="col">Criação</th>     
        <th scope="col">Atualização</th>     
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)              
        <tr>    
          <th>{{$user->id}}</th>          
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->created_at}}</td>
          <td>{{$user->updated_at}}</td>          
          <td>          
            <a href="{{route('user.show', $user->id)}}">
              <button class="btn btn-secondary">Visualizar</button>
            </a>
            <a href="{{route('user.edit', $user->id)}}">
              <button class="btn btn-primary">Editar</button>
            </a>
            
            <button class="btn btn-danger">Deletar</button>
          </td>
      </tr>
      @endforeach       
    </tbody>
  </table>
  @if (isset($filters))
    {{ $users->appends($filters)->links()}}
  @else
    {{$users->links()}}
  @endif
@endsection