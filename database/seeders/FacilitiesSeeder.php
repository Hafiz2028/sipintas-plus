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
                'facility_type_id' => 4,
                'name' => 'Aula Kantor Gubernur',
                'size' => '± 50',
                'kapasitas' => '± 150',
                'information' => 'Fasilitas : Kursi, Meja, infokus serta sound system',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'facility_type_id' => 3,
                'name' => 'Ruang Rapat Rumah Bagonjong Lantai II',
                'size' => '± 10',
                'kapasitas' => '± 50',
                'information' => 'Fasilitas : Kursi, Meja, infokus serta sound system',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'facility_type_id' => 3,
                'name' => 'Ruang Lobby/Transit Lantai I',
                'size' => '± 5',
                'kapasitas' => '± 20',
                'information' => 'Fasilitas : kursi tamu, meja dan kursi rapat',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'facility_type_id' => 3,
                'name' => 'Masjid Baitul Aulita Kantor Gubernur',
                'size' => '± 30',
                'kapasitas' => '± 300',
                'information' => 'Fasilitas : AC, Mimbar, Sound System',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'facility_type_id' => 7,
                'name' => 'Halaman Depan Kantor Gubernur',
                'size' => '± 100',
                'kapasitas' => '± 800',
                'information' => 'Lapangan Luas didepan kantor Gubernur',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'facility_type_id' => 7,
                'name' => 'Tempat Parkir Kendaraan Kantor Gubernur',
                'size' => '± 25',
                'kapasitas' => '± 200',
                'information' => 'Lapangan Parkir Kendaraan kantor Gubernur',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'facility_type_id' => 5,
                'name' => 'Auditorium Gubernur',
                'size' => '± 50',
                'kapasitas' => '± 200',
                'information' => 'Fasilitas : kursi, meja, infokus, sound system serta video wall',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'facility_type_id' => 3,
                'name' => 'Ruang Rapat Istana Gubernur',
                'size' => '± 10',
                'kapasitas' => '± 40',
                'information' => 'Fasilitas : kursi, meja, infocus dan sound system',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'facility_type_id' => 3,
                'name' => 'Ruang Rapat Hasan Basri Istana Gubernur',
                'size' => '± 4',
                'kapasitas' => '± 15',
                'information' => 'Fasilitas : kursi, meja rapat dan Smart TV',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'facility_type_id' => 7,
                'name' => 'Halaman depan Istana Gubernur',
                'size' => '± 120',
                'kapasitas' => '± 1000',
                'information' => 'Halaman Luas di depan Istana Gubernur',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'facility_type_id' => 4,
                'name' => 'Aula Besar di Lantai IV',
                'size' => '± 18',
                'kapasitas' => '± 150',
                'information' => 'Tarif Retribusi Rp. 1.500.000 per Hari|Fasilitas : kursi, meja, infokus dan sound system',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'facility_type_id' => 4,
                'name' => 'Aula Kecil di Lantai III',
                'size' => '± 7',
                'kapasitas' => '± 50',
                'information' => 'Tarif Retribusi Rp. 1.000.000 per Hari|Fasilitas : kursi, meja, infokus dan sound system',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 13,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu I',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu II',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 15,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu III',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 16,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu IV',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 17,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu V',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 18,
                'facility_type_id' => 2,
                'name' => 'Penginapan Standar Bukit Lampu VI',
                'size' => '± 16',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 19,
                'facility_type_id' => 2,
                'name' => 'Penginapan VIP Bukit Lampu I Lantai III',
                'size' => '± 20',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 20,
                'facility_type_id' => 2,
                'name' => 'Penginapan VIP Bukit Lampu I Lantai III',
                'size' => '± 20',
                'kapasitas' => '± 2',
                'information' => 'Biaya Sewa 1 Malam Rp. 400.000,- untuk Umum dan Rp. 300.000,- untuk ASN Gol IV Gol I s.d III',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 21,
                'facility_type_id' => 4,
                'name' => 'Aula Besar Istana Bung Hatta',
                'size' => '± 40',
                'kapasitas' => '± 300',
                'information' => 'Tarif Retribusi : Rp. 3.000.000 per hari |Fasilitas : kursi, meja, infokus dan sound system',
                'pembayaran' => 'ya',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'facility_type_id' => 4,
                'name' => 'Aula Kecil Istana Bung Hatta',
                'size' => '± 8',
                'kapasitas' => '± 60',
                'information' => 'Tarif Retribusi : Rp. 2.000.000 per hari |Fasilitas : kursi, meja, infokus dan sound system',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 23,
                'facility_type_id' => 3,
                'name' => 'Ruang Tamu Istana Gubernur',
                'size' => '± 8',
                'kapasitas' => '± 30',
                'information' => 'Fasilitas: Kursi Tamu',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 24,
                'facility_type_id' => 1,
                'name' => 'Innova Luxury BA 1733 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Hitam |Tahun 2015 |BA 1733 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 25,
                'facility_type_id' => 1,
                'name' => 'Hiace Advance BA 7232 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mikrobus Warna Silver Metalik |Tahun 2015 |BA 7232 B |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 26,
                'facility_type_id' => 1,
                'name' => 'Hiace Advance BA 7233 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mikrobus Warna Silver Metalik |Tahun 2015 |BA 7233 B |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 27,
                'facility_type_id' => 1,
                'name' => 'Kijang Innova BA 1786 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Hitam |Tahun 2013 |BA 1786 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 28,
                'facility_type_id' => 1,
                'name' => 'Bus Mit. Colt/Diesel BA 7220 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Bus Warna Putih |Tahun 2012 |BA 7220 B |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 29,
                'facility_type_id' => 1,
                'name' => 'Innova BA 1217 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Hitam |Tahun 2011 |BA 1217 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 30,
                'facility_type_id' => 1,
                'name' => 'Pajero Sport BA 1638 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Jeep Warna Putih |Tahun 2011 |BA 1638 B |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 31,
                'facility_type_id' => 1,
                'name' => 'Fortuner BA 1394 AD',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Jeep Warna Hitam |Tahun 2010 |BA 1394 AD |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 32,
                'facility_type_id' => 1,
                'name' => 'Bus Mit. Colt/Diesel BA 7174 A',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Bus Warna Abu-abu |Tahun 2008 |BA 7174 A |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 33,
                'facility_type_id' => 1,
                'name' => 'Bus Mit. Colt/Diesel BA 7006 A',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Bus Warna Abu-abu |Tahun 2008 |BA 7006 A |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 34,
                'facility_type_id' => 1,
                'name' => 'Kijang Innova BA 1592 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Abu-abu |Tahun 2007 |BA 1592 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 35,
                'facility_type_id' => 1,
                'name' => 'Camry BA 1593 AO',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Sedan Warna Abu-abu |Tahun 2005 |BA 1593 AO |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 36,
                'facility_type_id' => 1,
                'name' => 'Ambulance BA 9025 BK',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Putih |Tahun 2015 |BA 9025 BK |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 37,
                'facility_type_id' => 1,
                'name' => 'Innova BA 1433 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Hitam |Tahun 2011 |BA 1433 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 38,
                'facility_type_id' => 1,
                'name' => 'Hilux BA 8265 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Pick Up Warna Silver Metalik |Tahun 2014 |BA 8265 B |Jenis BBM Solar |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 39,
                'facility_type_id' => 1,
                'name' => 'X-Trail BA 1918 B',
                'size' => '± 6',
                'kapasitas' => '± 7',
                'information' => 'Kendaraan Mini Bus Warna Hitam |Tahun 2014 |BA 1918 B |Jenis BBM Bensin |Keadaan Baik|',
                'pembayaran' => 'tidak',
                'map_link' => 'https://maps.app.goo.gl/L7YLNyM4So5REhUx8',
                'created_at' => now(),
                'updated_at' => now()
            ],


        ]);
        DB::table('facility_images')->insert([
            [
                'id' => 1,
                'facility_id' => 1,
                'image' => 'Aula_Kantor_Gub_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'facility_id' => 1,
                'image' => 'Aula_Kantor_Gub_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'facility_id' => 1,
                'image' => 'Aula_Kantor_Gub_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'facility_id' => 1,
                'image' => 'Aula_Kantor_Gub_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'facility_id' => 2,
                'image' => 'Ruang_Rapat_Rumah_Bagonjong_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'facility_id' => 2,
                'image' => 'Ruang_Rapat_Rumah_Bagonjong_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'facility_id' => 2,
                'image' => 'Ruang_Rapat_Rumah_Bagonjong_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'facility_id' => 2,
                'image' => 'Ruang_Rapat_Rumah_Bagonjong_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'facility_id' => 2,
                'image' => 'Ruang_Rapat_Rumah_Bagonjong_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 13,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 15,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 16,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_7.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 17,
                'facility_id' => 3,
                'image' => 'Ruang_Loby_Transit_8.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 18,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 19,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 20,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 21,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 23,
                'facility_id' => 4,
                'image' => 'Masjid_Kagub_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 24,
                'facility_id' => 5,
                'image' => 'Halaman_depan_kagub_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 25,
                'facility_id' => 5,
                'image' => 'Halaman_depan_kagub_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 26,
                'facility_id' => 5,
                'image' => 'Halaman_depan_kagub_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 27,
                'facility_id' => 5,
                'image' => 'Halaman_depan_kagub_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 28,
                'facility_id' => 5,
                'image' => 'Halaman_depan_kagub_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 29,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 30,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 31,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 32,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 33,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 34,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 35,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_7.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 36,
                'facility_id' => 6,
                'image' => 'Parkir_Kendaraan_8.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 37,
                'facility_id' => 7,
                'image' => 'Audit_Istana_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 38,
                'facility_id' => 7,
                'image' => 'Audit_Istana_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 39,
                'facility_id' => 7,
                'image' => 'Audit_Istana_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 40,
                'facility_id' => 7,
                'image' => 'Audit_Istana_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 41,
                'facility_id' => 8,
                'image' => 'Rr_Istana_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 42,
                'facility_id' => 8,
                'image' => 'Rr_Istana_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 43,
                'facility_id' => 8,
                'image' => 'Rr_Istana_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 44,
                'facility_id' => 8,
                'image' => 'Rr_Istana_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 45,
                'facility_id' => 9,
                'image' => 'Rr_HasanBasri_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 46,
                'facility_id' => 9,
                'image' => 'Rr_HasanBasri_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 47,
                'facility_id' => 9,
                'image' => 'Rr_HasanBasri_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 48,
                'facility_id' => 10,
                'image' => 'Lapangan_istana.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 49,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 50,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 51,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 52,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 53,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 54,
                'facility_id' => 11,
                'image' => 'Aula_Besar_BL_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 55,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 56,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 57,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 58,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 59,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 60,
                'facility_id' => 12,
                'image' => 'Aula_Kecil_BL_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 61,
                'facility_id' => 13,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 62,
                'facility_id' => 13,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 63,
                'facility_id' => 13,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 64,
                'facility_id' => 13,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 65,
                'facility_id' => 14,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 66,
                'facility_id' => 14,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 67,
                'facility_id' => 14,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 68,
                'facility_id' => 14,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 69,
                'facility_id' => 15,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 70,
                'facility_id' => 15,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 71,
                'facility_id' => 15,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 72,
                'facility_id' => 15,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 73,
                'facility_id' => 16,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 74,
                'facility_id' => 16,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 75,
                'facility_id' => 16,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 76,
                'facility_id' => 16,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 77,
                'facility_id' => 17,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 78,
                'facility_id' => 17,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 79,
                'facility_id' => 17,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 80,
                'facility_id' => 17,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 81,
                'facility_id' => 18,
                'image' => 'Kamar_Standar_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 82,
                'facility_id' => 18,
                'image' => 'Kamar_Standar_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 83,
                'facility_id' => 18,
                'image' => 'Kamar_Standar_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 84,
                'facility_id' => 18,
                'image' => 'Kamar_Standar_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 85,
                'facility_id' => 19,
                'image' => 'Kamar_VIP_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 86,
                'facility_id' => 19,
                'image' => 'Kamar_VIP_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 87,
                'facility_id' => 19,
                'image' => 'Kamar_VIP_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 88,
                'facility_id' => 19,
                'image' => 'Kamar_VIP_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 89,
                'facility_id' => 19,
                'image' => 'Kamar_VIP_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 90,
                'facility_id' => 20,
                'image' => 'Kamar_VIP_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 91,
                'facility_id' => 20,
                'image' => 'Kamar_VIP_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 92,
                'facility_id' => 20,
                'image' => 'Kamar_VIP_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 93,
                'facility_id' => 20,
                'image' => 'Kamar_VIP_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 94,
                'facility_id' => 20,
                'image' => 'Kamar_VIP_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 95,
                'facility_id' => 21,
                'image' => 'Aula_Besar_BH_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 96,
                'facility_id' => 21,
                'image' => 'Aula_Besar_BH_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 97,
                'facility_id' => 21,
                'image' => 'Aula_Besar_BH_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 98,
                'facility_id' => 21,
                'image' => 'Aula_Besar_BH_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 99,
                'facility_id' => 22,
                'image' => 'Aula_Kecil_BH_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 100,
                'facility_id' => 22,
                'image' => 'Aula_Kecil_BH_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 101,
                'facility_id' => 22,
                'image' => 'Aula_Kecil_BH_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 102,
                'facility_id' => 22,
                'image' => 'Aula_Kecil_BH_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 103,
                'facility_id' => 23,
                'image' => 'Rt_Istana_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 104,
                'facility_id' => 23,
                'image' => 'Rt_Istana_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 105,
                'facility_id' => 23,
                'image' => 'Rt_Istana_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 106,
                'facility_id' => 23,
                'image' => 'Rt_Istana_5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 107,
                'facility_id' => 23,
                'image' => 'Rt_Istana_6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            //kendaraan
            [
                'id' => 108,
                'facility_id' => 26,
                'image' => 'Hiace_7233_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 109,
                'facility_id' => 26,
                'image' => 'Hiace_7233_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 110,
                'facility_id' => 26,
                'image' => 'Hiace_7233_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 111,
                'facility_id' => 28,
                'image' => 'Bus_7220_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 112,
                'facility_id' => 28,
                'image' => 'Bus_7220_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 113,
                'facility_id' => 28,
                'image' => 'Bus_7220_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            //inova1217
            [
                'id' => 114,
                'facility_id' => 29,
                'image' => 'Inova_1217_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 115,
                'facility_id' => 29,
                'image' => 'Inova_1217_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 116,
                'facility_id' => 29,
                'image' => 'Inova_1217_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 117,
                'facility_id' => 30,
                'image' => 'Pajero_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 118,
                'facility_id' => 30,
                'image' => 'Pajero_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 119,
                'facility_id' => 31,
                'image' => 'Fortuner_1394_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 120,
                'facility_id' => 31,
                'image' => 'Fortuner_1394_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 121,
                'facility_id' => 32,
                'image' => 'Bus_7174.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 122,
                'facility_id' => 32,
                'image' => 'Bus_7174_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 123,
                'facility_id' => 36,
                'image' => 'Ambulance_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 124,
                'facility_id' => 36,
                'image' => 'Ambulance_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 125,
                'facility_id' => 36,
                'image' => 'Ambulance_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 126,
                'facility_id' => 37,
                'image' => 'Inova_1433_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 127,
                'facility_id' => 37,
                'image' => 'Inova_1433_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 128,
                'facility_id' => 37,
                'image' => 'Inova_1433_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 129,
                'facility_id' => 37,
                'image' => 'Inova_1433_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 130,
                'facility_id' => 39,
                'image' => 'X-Trail_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 131,
                'facility_id' => 39,
                'image' => 'X-Trail_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 132,
                'facility_id' => 39,
                'image' => 'X-Trail_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 133,
                'facility_id' => 39,
                'image' => 'X-Trail_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 134,
                'facility_id' => 25,
                'image' => 'Hiace_7232_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 135,
                'facility_id' => 25,
                'image' => 'Hiace_7232_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 136,
                'facility_id' => 25,
                'image' => 'Hiace_7232_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 137,
                'facility_id' => 25,
                'image' => 'Hiace_7232_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 138,
                'facility_id' => 27,
                'image' => 'Inova_1786_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 139,
                'facility_id' => 27,
                'image' => 'Inova_1786_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 140,
                'facility_id' => 27,
                'image' => 'Inova_1786_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 141,
                'facility_id' => 33,
                'image' => 'Bus_7006_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 142,
                'facility_id' => 33,
                'image' => 'Bus_7006_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 143,
                'facility_id' => 33,
                'image' => 'Bus_7006_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 144,
                'facility_id' => 33,
                'image' => 'Bus_7006_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 145,
                'facility_id' => 34,
                'image' => 'Inova_1592_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 146,
                'facility_id' => 34,
                'image' => 'Inova_1592_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 147,
                'facility_id' => 34,
                'image' => 'Inova_1592_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 148,
                'facility_id' => 34,
                'image' => 'Inova_1592_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 149,
                'facility_id' => 35,
                'image' => 'Camry_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 150,
                'facility_id' => 35,
                'image' => 'Camry_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 151,
                'facility_id' => 35,
                'image' => 'Camry_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 152,
                'facility_id' => 35,
                'image' => 'Camry_4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 153,
                'facility_id' => 38,
                'image' => 'Hilux_1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 154,
                'facility_id' => 38,
                'image' => 'Hilux_2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 155,
                'facility_id' => 38,
                'image' => 'Hilux_3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],


        ]);
    }
}
