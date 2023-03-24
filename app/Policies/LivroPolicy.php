<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Livro;

class LivroPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    
    public function verLivro(User $user, Livro $livro)
    {
        return $user != null;
    }
}
