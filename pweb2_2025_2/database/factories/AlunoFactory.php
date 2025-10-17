<?php

namespace Database\Factories;

use App\Models\CategoriaAluno;
use Illuminate\Database\Eloquent\Factories\Factory;


class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->numerify('###########'),
            'telefone' => $this->faker->phoneNumber(),
            'imagem' => null,
            'categoria_id' => (CategoriaAluno::All()->random())->id
        ];
    }
}
