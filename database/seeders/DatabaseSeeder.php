<?php

namespace Database\Seeders;

use App\Models\Acount;
use App\Models\Entry;
use App\Models\Expense;
use App\Models\Levy;
use App\Models\NecessaryExpense;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crée 3 utilisateurs
        User::factory()->count(3)->create()->each(function ($user) {
            // Crée 1 compte pour chaque utilisateur
            $account = Acount::factory()->create([
                'user_id' => $user->id,
            ]);

            // Crée 1 Entry
            Entry::factory()->create([
                'acount_id' => $account->id,
            ]);

            // Crée 2 Expenses
            Expense::factory()->count(2)->create([
                'acount_id' => $account->id,
            ]);

            // Crée 3 NecessaryExpenses
            NecessaryExpense::factory()->count(3)->create([
                'acount_id' => $account->id,
            ]);

            // Crée 5 Levies
            Levy::factory()->count(5)->create([
                'acount_id' => $account->id,
            ]);
        });
    }
}
