<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;

class CarrinhoController extends Controller
{

    public function carrinhoLista()
    {
        $cart1 = Cart::class;
        dd($cart1);
    }

    public function adicionaCarrinho(Request $request)
    {
        Cart::addItem([
            'id' => $request->id,
            'name' => $request->name,
            'disponivel' => $request->diponivel,
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->img
            )
        ]);
    }
}
