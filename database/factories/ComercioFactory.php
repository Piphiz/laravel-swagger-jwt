<?php

namespace Database\Factories;

use App\Models\Comercio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComercioFactory extends Factory
{
    protected $model = Comercio::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'endereco' => $this->faker->address,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
