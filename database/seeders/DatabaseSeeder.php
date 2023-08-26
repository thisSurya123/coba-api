<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'User 1',
            'email' => 'user1@webtech.id',
            'password' => Hash::make('password1')
        ]);
        User::create([
            'name' => 'User 2',
            'email' => 'user2@webtech.id',
            'password' => Hash::make('password2')
        ]);
        User::create([
            'name' => 'User 3',
            'email' => 'user3@webtech.id',
            'password' => Hash::make('password3')
        ]);
    }
}
