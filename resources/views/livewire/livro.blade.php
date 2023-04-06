		<div>
		    <h1 class="text-3xl mb-2">{{ $livro->titulo}} - ${{ $livro->disponivel}}</h1>
		    <p class="text-lg mb-2">{{ $livro->descricao}}</p>
		    <input class="mb-2 border-2 rounded" type="number" min="1" wire:model="quantity">
		    <button class="p-2 border-2 rounded border-blue-500 hover:border-blue-600 bg-blue-500 hover:bg-blue-600" wire:click="addToCart">Add To Cart</button>
		</div>