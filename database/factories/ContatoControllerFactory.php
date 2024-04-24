<?php

namespace Database\Factories;

use App\Models\ContatoController;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatoControllerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContatoController::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        'cpf' => $this->faker->word,
        'telefone' => $this->faker->word,
        'cep' => $this->faker->word,
        'endereco' => $this->faker->word,
        'complemento' => $this->faker->word,
        'latitude' => $this->faker->word,
        'longitude' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
