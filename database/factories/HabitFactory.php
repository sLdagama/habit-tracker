<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitFactory extends Factory
{
    public function definition(): array
    {
        $habits = [
            'Ler 10 páginas',
            'Meditar por 15 minutos',
            'Fazer exercícios físicos',
            'Beber 2 litros de água',
            'Estudar Programação',
            'Caminhada matinal',
            'Comer uma fruta',
            'Dormir 8 horas'
        ];

        return [
            // Em vez de 1 fixo, tenta pegar o primeiro usuário ou criar um
            'user_id' => User::first()?->id ?? User::factory(),
            // Usamos shuffle e shift para garantir unicidade sem erro de "null"
            'name' => fake()->unique()->randomElement($habits),
        ];
    }
}