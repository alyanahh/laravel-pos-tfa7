<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'full_name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'phone' => '09171234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'phone' => '09181234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Pedro Reyes',
                'email' => 'pedro@example.com',
                'phone' => '09191234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Ana Garcia',
                'email' => 'ana@example.com',
                'phone' => '09201234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Carlo Mendoza',
                'email' => 'carlo@example.com',
                'phone' => '09211234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}