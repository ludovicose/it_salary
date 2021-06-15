<?php

namespace Database\Seeders;

use App\Models\BalanceHistory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        BalanceHistory::factory()->count(50)->create([
            'user_id'=> User::factory()->create()
        ]);
    }
}
