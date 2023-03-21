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
		<button class="btn orange btn-large">Alugar</button>
	</div>
</div>

@endsection()