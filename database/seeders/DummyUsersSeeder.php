<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Pak Admin',
                'nip' => '11111',
                'no_hp' => '08239481233',
                'opd' => 'Admin Aplikasi',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Pak Kabag',
                'nip' => '22222',
                'no_hp' => '08239481223',
                'opd' => 'Kepala Bagian',
                'role' => 'kabag',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Pak Peminjam',
                'nip' => '33333',
                'no_hp' => '08239481233',
                'opd' => 'Peminjam Komunitas A',
                'role' => 'peminjam',
                'password' => bcrypt('admin'),
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
