<?php

namespace Database\Seeders;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HabitLogSeeder extends Seeder
{
    public function run(): void
    {
        $habits = Habit::all();

        foreach ($habits as $habit) {
            // Criamos uma coleção com os últimos 30 dias
            $availableDates = collect(range(0, 30))
                ->map(fn($days) => now()->subDays($days)->format('Y-m-d'));

            // Embaralhamos as datas e pegamos 10 delas (garante que são únicas para este hábito)
            $selectedDates = $availableDates->shuffle()->take(10);

            foreach ($selectedDates as $date) {
                HabitLog::factory()->create([
                    'habit_id' => $habit->id,
                    'user_id'  => $habit->user_id, // Garante que o log pertence ao dono do hábito
                    'completed_at' => $date,
                ]);
            }
        }
    }
}