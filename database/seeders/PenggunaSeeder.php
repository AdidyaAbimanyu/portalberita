<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Admin Portal Berita',
                'email' => 'adidyawork88@gmail.com',
                'password' => Hash::make('darknet12'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Hidayat',
                'email' => 'ahmad@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Wijaya',
                'email' => 'rina@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Joko Widodo',
                'email' => 'joko@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rudi Hartono',
                'email' => 'rudi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maya Kusuma',
                'email' => 'maya@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Andi Pratama',
                'email' => 'andi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'pembaca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('pengguna')->insert($user);
            $this->command->info("✓ User created: {$user['nama']} ({$user['email']}) - Role: {$user['role']}");
        }
    }
}
