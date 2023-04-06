<?php
namespace App\Http\Livewire;
use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class LivroComponent extends Component
{
	public $livro;
    public $quantity;
    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->quantity = 1;
    }
        /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.livro');
    }
    /**
     * Adds an item to cart.
     *
     * @return void
     */
    public function addToCart(): void
    {
    	Cart::add($this->livro->id, $this->livro->titulo, $this->livro->disponivel, $this->quantity);
        $this->emit('livroAddedToCart');
    }
}