@extends('site.layout')
@section('title', 'Home')
@section('conteudo')
	
<div class="row container">

	@foreach($livros as $livro)
	
	<div class="col s12 m4">
		<div class="card">
			<div class="card-image">
				<img src="{{ $livro->imagem }}"> 
				@can('verLivro', $livro)
					<a href="{{ route('site.details', $livro->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red">
					<i class="material-icons">visibility</i></a>
				@endcan
			</div>
			<div class="card-content">
				<span class="card-title">{{ $livro->titulo }}</span>
				<p>{{ Str::limit($livro->descricao, 20) }}</p>
			</div>
		</div>
	</div>
	
	@endforeach
</div>

<div class="row center">
	{{ $livros->links('custom.pagination') }}
</div>

@endsection()