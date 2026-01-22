<?php

namespace Database\Factories;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Deixamos como factory padrão, mas o Seeder irá sobrescrever
            'user_id' => User::factory(),
            'habit_id' => Habit::factory(),
            // Apenas gera uma data; a unicidade será tratada no Seeder
            'completed_at' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
        ];
    }
}