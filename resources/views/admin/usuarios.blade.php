@extends('admin.layout')
@section('titulo', 'Usuarios')
@section('conteudo')

 
    <div class="row container crud">
        

            <div class="row titulo ">              
              <h1 class="left">Usuários</h1>
              <span class="right chip">{{ $users->count()}} users exibidos nesta pagina</span>  
            </div>


           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
			@include('admin.includes.mensagens')
			<table class="striped ">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Sobrenome</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
	
				<tbody>
				@foreach($users as $user)
				<tr>
					<td><img src="{{ asset('img/user.png') }}" class="circle"></td>
					<td>#{{ $user->id }}</td>
					<td>{{ $user->firstName }}</td>
					<td>{{ $user->lastName }}</td>
					<td>{{ $user->email}}</td>
					<td><a class="btn-floating  waves-effect waves-light orange">
							<i class="material-icons">mode_edit</i></a>
					 	<a href="delete-{{ $user->id }}" class="btn-floating  waves-effect waves-light red">
					 		<i class="material-icons">delete</i></a>
						@include('admin.users.delete')</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>


	<div class="row center">{{ $users->links('custom.pagination') }}</div>

</div>
       
@endsection