<?php

namespace Database\Factories;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HabitLogFactory extends Factory
{
    public function definition(): array
    {
        // Uma data aleatória entre hoje e 30 dias atrás usando PHP puro
        $randomTimestamp = mt_rand(strtotime("-30 days"), time());
        $randomDate = date('Y-m-d', $randomTimestamp);

        return [
            'user_id' => User::factory(),
            'habit_id' => Habit::factory(),
            'completed_at' => $randomDate,
        ];
    }
}