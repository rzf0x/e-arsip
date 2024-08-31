<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin Website',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password123'),
            ],
        ];

        User::insert($data);
    }
}
