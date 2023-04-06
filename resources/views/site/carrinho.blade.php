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
			
			<div class="w-1/4">
    <div class="p-5 mx-2 my-2 max-w-md rounded border-2">
        @if ($content->count() > 0)
        @foreach ($content as $id => $item)
        <p class="text-2xl text-right mb-2">
            <button class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300" wire:click="updateCartItem({{ $id }}, 'minus')"> - </button>
            {{ $item->get('name') }} x {{ $item->get('quantity') }}
            <button class="text-sm p-2 border-2 rounded border-gray-200 hover:border-gray-300 bg-gray-200 hover:bg-gray-300" wire:click="updateCartItem({{ $id }}, 'plus')"> + </button>
            <button class="text-sm p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="removeFromCart({{ $id }})">Remove</button>
        </p>
        @endforeach
        <hr class="my-2">
        <p class="text-xl text-right mb-2">Total: ${{ $total }}</p>
        <button class="w-full p-2 border-2 rounded border-red-500 hover:border-red-600 bg-red-500 hover:bg-red-600" wire:click="clearCart">Clear Cart</button>
        @else
        <p class="text-3xl text-center mb-2">cart is empty!</p>
        @endif
    </div>
</div>
			
			
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