@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container"> <br>

	@if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Boa leitura!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
	@endif

	@if ($mensagem = Session::get('aviso'))
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title">Tudo bem!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
	@endif
	
	@if($itens->count() == 0)
	
		<div class="card orange">
            <div class="card-content white-text">
                <span class="card-title">Sem reservas encontradas!</span>
                <p>Adiquira já seu livro! </p>
            </div>
        </div>
	
	@else
	<div class="col s12 m6">
 		<h4>Você reservou: {{ $itens->count() }} livros.</h4>
		<table class="striped">
			<thead>
				<tr>
					<th></th>
					<th>Nome</th>
					<th>Disponivel</th>
					<th>Quantidade</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($itens as $item)
				<tr>
					<td><img src="{{ $item->imagem }}" width="70px" class="responsive-img circle"></td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->disponivel }}</td>
					
					{{-- BTN Atualizar --}} 
					<form action="{{ route('site.atualizacarrinho') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{ $item->id }}">
						<td><input style="width: 40px; font-weight: 900" class="white center" type="number" min="1" name="quantity" value="{{ $item->quantity}}"></td>
						<td>
						<button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
					</form>
					{{-- BTN Remover--}}
						<form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
    						@csrf
							<input type="hidden" name="id" value="{{ $item->id }}">
							<button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
						</form>
					</td>
				</tr>
			@endforeach()
			</tbody>
		</table>
		</div>	
		<div class="card orange">
            <div class="card-content white-text">
                <span class="card-title">{{ Cart::getTotal() }}</span>
                <p>Reservar livro!</p>
            </div>
        </div>
	@endif


		<div class="row container center">
			<a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue"> Voltar <i class="material-icons right">arrow_back</i></a>
			<a href="{{ route('site.limparcarrinho') }}" class="btn waves-effect waves-light blue"> Limpar reservas <i class="material-icons right">clear</i></a>
			<button class="btn waves-effect waves-light green"> Finalizar reserva <i class="material-icons right">clear</i></button>
		</div>
	</div>
</div>

@endsection()