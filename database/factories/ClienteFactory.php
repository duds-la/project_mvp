<?php

namespace Database\Factories;

use App\Models\TipoPessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Escolher aleatoriamente entre 'Pessoa Física' e 'Pessoa Jurídica'
         $tipoPessoa = TipoPessoa::inRandomOrder()->first();
         $isPessoaFisica = $tipoPessoa->codigo === 'PF';
 
         return [
             'nome' => $this->faker->firstName,
             'sobrenome' => $isPessoaFisica ? $this->faker->lastName : null,
             'cpf' => $isPessoaFisica ? $this->faker->numerify('###########') : null,
             'cpnj' => !$isPessoaFisica ? $this->faker->numerify('##############') : null,
             'tipo_id' => $tipoPessoa->id,
             'numero' => $this->faker->numerify('####'),
             'data_nascimento' => $this->faker->date('Y-m-d', '2005-01-01'),
             'email' => $this->faker->unique()->safeEmail,
             'created_at' => now(),
             'updated_at' => now(),
         ];
    }
}
