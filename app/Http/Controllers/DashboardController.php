<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Livro;
use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::all()->count();
        
        // grafico 1 - usuarios
        $usersData = User::select([
           DB::raw('YEAR(created_at) as ano'),
           DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();
        
        //arrays
        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }
        
        // chartjs
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        // grafico 2 - categorias
        $catData = Categoria::with('livros')->get();
        
        // array
        foreach($catData as $cat) {
            $catNome[] = "'" . $cat->nome."'";
            $catTotal[] = $cat->livros->count();
        }
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);        
        
        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
