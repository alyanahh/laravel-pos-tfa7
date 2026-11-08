<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'posadmin',
                'full_name' => 'POS Admin',
                'password' => bcrypt('ChangeMe123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'annacruz',
                'full_name' => 'Anna Cruz',
                'password' => bcrypt('ChangeMe123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'marksantos',
                'full_name' => 'Mark Santos',
                'password' => bcrypt('ChangeMe123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'johndoe',
                'full_name' => 'John Doe',
                'password' => bcrypt('ChangeMe123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'janesmith',
                'full_name' => 'Jane Smith',
                'password' => bcrypt('ChangeMe123!'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}