<?php

namespace Database\Seeders;

use \App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        User::factory()->create([
            'created_at' => now()->subDay(3),
            'email_verified_at' => null
        ]);
        User::factory()->create([
            'created_at' => now()->subWeek(2),
            'email_verified_at' => null
        ]);
        User::factory()->create([
            'created_at' => now()->subWeek(4),
            'email_verified_at' => null
        ]);
    }
}
