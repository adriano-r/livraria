<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->unique()->sentence();
        return [
            'titulo' => $titulo,
            'descricao' => $this->faker->paragraph(),
            'disponivel' => $this->faker->randomNumber(2),
            'autor' => $this->faker->unique()->sentence(),
            'slug' => Str::slug($titulo),
            'imagem' => $this->faker->imageUrl(400,400),
            
            'id_user' => User::pluck('id')->random(),
            
            'id_categoria' => Categoria::pluck('id')->random(),
            
        ];
    }
}
