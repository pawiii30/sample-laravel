<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $credentials = [
            [
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'name' => 'admin'
            ],
            [
            'email' => 'user@mail.com',
            'password' => bcrypt('user123'),
            'name' => 'user'
            ],
        ];
    foreach ($credentials as $user) {
            User::create($user);
        }
    }
    
        
}
