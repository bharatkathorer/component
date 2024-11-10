<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $password = Hash::make('password');
        for ($i = 1; $i <= 10000; $i++) {
            User::query()->updateOrCreate(['email' => 'test' . $i . '@example.com'],[
                'name' => 'Test User ' . $i,
                'password' => $password,
            ]);
        }

    }
}
