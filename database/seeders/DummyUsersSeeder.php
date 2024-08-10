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
                'name' => 'Super Admin',
                'nip' => '2011522028',
                'no_hp' => '08239481233',
                'opd' => 'blabla',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Super Kabag',
                'nip' => '123992338',
                'no_hp' => '08239481223',
                'opd' => 'blabla',
                'role' => 'kabag',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Super Peminjam',
                'nip' => '123932348',
                'no_hp' => '08239481233',
                'opd' => 'blabla',
                'role' => 'peminjam',
                'password' => bcrypt('admin'),
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
