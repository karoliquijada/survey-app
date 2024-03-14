<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create admin users
        User::create([
            'name' => 'Eren Yeager',
            'email' => 'erenyeager@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Mikasa Ackerman',
            'email' => 'mikasaackerman@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin');

        // Create regular users
        $characters = [
            'Armin Arlert',
            'Levi Ackerman',
            'Hange Zoë',
            'Erwin Smith',
            'Historia Reiss',
            'Jean Kirstein',
            'Sasha Blouse',
            'Connie Springer',
            'Annie Leonhart',
        ];

        foreach ($characters as $character) {
            User::create([
                'name' => $character,
                'email' => strtolower(str_replace(' ', '', $character)) . '@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}

