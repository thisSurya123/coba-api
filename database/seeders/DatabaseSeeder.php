<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Form;
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

        Form::create([
            'name'  => 'Biodata - Web Tech Member',
            'slug' => 'biodata',
            'description' => 'To save Web Tech member',
            'limit_one_response' => 1,
            'creator_id' => 1,
        ]);
        Form::create([
            'name'  => 'HTML and CSS Skills - Quiz',
            'slug' => 'htmlcss-quiz',
            'description' => 'Fundamental web test',
            'limit_one_response' => 1,
            'creator_id' => 1,
        ]);
        Form::create([
            'name'  => 'Stacks of Web Tech Member',
            'slug' => 'member-stacks',
            'description' => 'To collect all favorite stacks',
            'limit_one_response' => 1,
            'creator_id' => 1,
        ]);
    }
}
