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
            'Dormir 8 horas',
            'Praticar Inglês',
            'Organizar a mesa'
        ];

        return [
            // PHP Puro: Pega um ID de usuário ou cria um novo
            'user_id' => User::first()?->id ?? User::factory(),
            
            // PHP Puro: Sorteia um índice aleatório do array sem usar Faker
            'name' => $habits[array_rand($habits)],
        ];
    }
}