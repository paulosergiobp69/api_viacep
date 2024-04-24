<?php

namespace Database\Factories;

use App\Models\UsuarioController;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioControllerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsuarioController::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        'senha' => $this->faker->word,
        'login' => $this->faker->word
        ];
    }
}
