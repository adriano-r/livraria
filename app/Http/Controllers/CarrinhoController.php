<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jackiedo\Cart\Cart;
use App\Models\Livro;



class CarrinhoController extends Controller
{

    public function index()
    {
          $itens = Livro::all();
         return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
//         $carrinho = Cart::class;
//         $carrinho->addItem([
//             'id' => $request->id,
//             'name' => $request->name,
//             'disponivel' => $request->diponivel,
//             'quantity' => abs($request->qnt),
//             'attributes' => array(
//                 'image' => $request->img
//             )
//         ]);

//         return redirect()->route('site.carrinho')->with('sucesso', 'Livro reservado com sucesso!');

    	
    	$livro = Livro::findOrFail($request->id);
    	
    	$cart = session()->get('cart', []);
    	
    	if(isset($cart[$request->id])) {
    		$cart[$request->id]['quantity']++;
    	} else {
    		$cart[$request->id] = [
    				"name" => $livro->titulo,
    				"quantity" => 1,
    				"disponivel" => $livro->disponivel,
    		];
    	}
    	
    	session()->put('cart', $cart);
    	
        return redirect()->route('site.carrinho')->with('sucesso', 'Livro reservado com sucesso!');
    	
    	
    }

    public function removeCarrinho(Request $request)
     {
//         Cart::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Livro removido com sucesso!');
    }
    
    public function atualizaCarrinho(Request $request) 
    {
//         Cart::update($request->id, [
//             'quantity' => [
//                 'relative' => false,
//                 'value' => abs($request->quantity),
//             ],
//         ]); 
        return redirect()->route('site.carrinho')->with('sucesso', 'Livro atualizado com sucesso!');
    }
    
    public function limparCarrinho()
    {
//         Cart::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho esta vazio!');
    }
    
//     -------------------------------
    

   
    public function store(Request $request)
    {
    	$request->validate([
    			'name' => 'required',
    			'price' => 'required',
    	]);
    	
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->price = $request->input('price');
    	$product->save();
    	
    	return redirect()->route('index')->with('success', 'Product added successfully.');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
    	return view('cart');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function update(Request $request)
    {
    	if($request->id && $request->quantity){
    		$cart = session()->get('cart');
    		$cart[$request->id]["quantity"] = $request->quantity;
    		session()->put('cart', $cart);
    		session()->flash('success', 'Cart updated successfully');
    	}
    }
    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\RedirectResponse()
     */
    
    //    public function destroy($id)
    //    {
    //        $product = Product::findOrFail($id);
    //        $product->delete();
    //
    //        return redirect()->back()->with('success', 'Product deleted successfully!');
    //    }
    public function remove(Request $request)
    {
    	if($request->id) {
    		$cart = session()->get('cart');
    		if(isset($cart[$request->id])) {
    			unset($cart[$request->id]);
    			session()->put('cart', $cart);
    		}
    		session()->flash('success', 'Product removed successfully');
    	}
    }
    public function checkout(Request $request)
    {
    	$cartItems = session('cart', []);
    	$total = 0;
    	foreach ($cartItems as $id => $details) {
    		$total += $details['price'] * $details['quantity'];
    	}
    	return view('cart', compact('total'));
    }
    
        
}
