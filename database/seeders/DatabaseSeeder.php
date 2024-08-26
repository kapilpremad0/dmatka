<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::UpdateOrCreate(['email' => 'admin@gmail.com'],[
            'name' => 'Keshav Sharma',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'role' => User::$admin,
            'password_2' => 'Admin@123',
            'mobile' => 7742421918
        ]);
    }
}
