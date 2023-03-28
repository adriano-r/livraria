@extends('admin.layout')
@section('titulo', 'Livros')
@section('conteudo')

<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
      <i class="large material-icons">add</i>
    </a>   
</div>

@include('admin.livros.create')
 
    <div class="row container crud">
        

            <div class="row titulo ">              
              <h1 class="left">Livros</h1>
              <span class="right chip">{{ $livros->count()}} livros exibidos nesta pagina</span>  
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
                    <th>Livro</th>
                      
                      <th>Disponivel</th>
                      <th>Categoria</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>
                
                @foreach($livros as $livro)
                
                  <tr>
                    <td><img src="{{ url("storage/{$livro->imagem} ")}}" class="circle "></td>
                    <td>#{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>                    
                    <td> {{ $livro->disponivel }} </td>
                    <td>{{ $livro->categoria->nome }}</td>
                    <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                      <a href="delete-{{ $livro->id }}" class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></a>
                      @include('admin.livros.delete')
                   	</td>
                  </tr>
              	@endforeach
                </tbody>
              </table>
            </div>


	<div class="row center">{{ $livros->links('custom.pagination') }}</div>

</div>
       
@endsection