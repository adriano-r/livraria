<?php
namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{

    public function index()
    {
        $livros = Livro::paginate(3);
        return view('site.home', compact('livros'));
    }

    public function details($slug)
    {
        $livro = Livro::where('slug', $slug)->first();
        
//         Gate::authorize('ver-livro', $livro);
//         $this->authorize('verLivro', $livro);

        if(auth()->user()->can('verLivro', $livro)){
            return view('site.details', compact('livro'));
        }
        if(auth()->user()->cannot('verLivro', $livro)){
            return view('site.details', compact('livro'));
        }
        
        return view('site.details', compact('livro'));
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        $livros = Livro::where('id', $id)->paginate(3);
        return view('site.categoria', compact('livros', 'categoria'));
    }
}
