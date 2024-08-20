<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data into the facility_types table
        DB::table('facility_types')->insert([
            ['id' => 1, 'name' => 'Kendaraan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Penginapan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Ruang Rapat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Aula', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Auditorium', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Peralatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Lapangan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert data into the facilities table
        DB::table('facilities')->insert([
            [
                'id' => 1,
                'facility_type_id' => 2,
                'name' => 'Aula Kantor Gubernur',
                'size' => '500',
                'kapasitas' => '200',
                'information' => 'Gedung dengan ciri..',
                'pembayaran' => 'ya',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'facility_type_id' => 1,
                'name' => 'Innova Reborn',
                'size' => '4',
                'kapasitas' => '8',
                'information' => 'Mobil Dinas yang..',
                'pembayaran' => 'tidak',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'facility_type_id' => 2,
                'name' => 'Meeting Room',
                'size' => '40',
                'kapasitas' => '100',
                'information' => 'Gedung kantor yang digunakan untuk..',
                'pembayaran' => 'tidak',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'facility_type_id' => 3,
                'name' => 'Lapangan Upacara',
                'size' => '600',
                'kapasitas' => '3000',
                'information' => 'Area kantor yang digunakan untuk..',
                'pembayaran' => 'tidak',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
