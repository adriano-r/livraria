@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container"> <br>
	<div class="col s12 m6">
		<img src="{{ $livro->imagem }}" class="responsive-img">
	</div>
	
	<div class="col s12 m6">
		<h4> {{ $livro->titulo }} </h4>
		<p> Autor: {{ $livro->autor }} </p>
		<p> {{ $livro->descricao }} </p>
		<p> Disponiveis: {{ $livro->disponivel }} </p>
		<p> Postado por: {{ $livro->user->firstName}} <br>
			Categoria: {{ $livro->categoria->nome }}
		</p>
		
		<form action="{{ route('site.addcarrinho', $livro) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="{{ $livro->id }}">
			<input type="hidden" name="name" value="{{ $livro->nome }}">
			<input type="hidden" name="disponivel" value="{{ $livro->disponivel }}">
			<input type="number" name="qnt" min="1" value="1">
			<input type="hidden" name="img" value="{{ $livro->imagem }}">
			<button class="btn orange btn-large">Reservar</button>
		</form>
	</div>
</div>

@endsection()