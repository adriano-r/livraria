<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;



class CarrinhoController extends Controller
{

    public function carrinhoLista()
    {
               
//          $itens = Cart::all();

        dd($itens);
        // return view('site.carrinho', compact('itens'));
        // return view('site.carrinho');
    }

    public function adicionaCarrinho(Request $request)
    {
        $carrinho = Cart::class;
        $carrinho->addItem([
            'id' => $request->id,
            'name' => $request->name,
            'disponivel' => $request->diponivel,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Livro reservado com sucesso!');
    }

    public function removeCarrinho(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Livro removido com sucesso!');
    }
    
    public function atualizaCarrinho(Request $request) 
    {
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ],
        ]); 
        return redirect()->route('site.carrinho')->with('sucesso', 'Livro atualizado com sucesso!');
    }
    
    public function limparCarrinho()
    {
        Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho esta vazio!');
    }
        
}
