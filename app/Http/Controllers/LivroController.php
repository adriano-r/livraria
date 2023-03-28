<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categoria;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//         $livros = Livro::paginate(3);
//             return view('site.home', compact('livros'));
        $livros = Livro::paginate(5);
        $categorias = Categoria::all();
        return view('admin.livros', compact('livros', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $livro = $request->all();
        
        if($request->imagem) {
        	$livro['imagem'] = $request->imagem->store('livros');
        }
        
        $livro['slug'] = Str::slug($request->titulo);
        $livro = Livro::create($livro);
        
        return redirect()->route('admin.livros')->with('sucesso', 'Livro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livro $livro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro = Livro::find($id);
        $livro->delete();
        return redirect()->route('admin.livros')->with('sucesso', 'Livro removido com sucesso!');
    }
}
