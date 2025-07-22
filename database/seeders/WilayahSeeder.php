<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Kabupaten
        DB::table('wil_kab')->insert([
            ['id' => 1, 'kab_kode' => '3404', 'kab_nama' => 'Sleman'],
            ['id' => 2, 'kab_kode' => '3402', 'kab_nama' => 'Bantul'],
            ['id' => 3, 'kab_kode' => '3403', 'kab_nama' => 'Gunung Kidul'],
            ['id' => 4, 'kab_kode' => '3401', 'kab_nama' => 'Kulon Progo'],
            ['id' => 5, 'kab_kode' => '3471', 'kab_nama' => 'Kota Yogyakarta'],
        ]);

        // Seed Kecamatan
        DB::table('wil_kec')->insert([
            ['id' => 1, 'kab_id' => 5, 'kec_kode' => '01', 'kec_nama' => 'Danurejan'],
            ['id' => 2, 'kab_id' => 5, 'kec_kode' => '02', 'kec_nama' => 'Gedongtengen'],
            ['id' => 3, 'kab_id' => 5, 'kec_kode' => '03', 'kec_nama' => 'Gondokusuman'],
            ['id' => 4, 'kab_id' => 5, 'kec_kode' => '04', 'kec_nama' => 'Gondomanan'],
            ['id' => 5, 'kab_id' => 5, 'kec_kode' => '05', 'kec_nama' => 'Jetis'],
            ['id' => 6, 'kab_id' => 5, 'kec_kode' => '06', 'kec_nama' => 'Kotagede'],
            ['id' => 7, 'kab_id' => 5, 'kec_kode' => '07', 'kec_nama' => 'Kraton'],
            ['id' => 8, 'kab_id' => 5, 'kec_kode' => '08', 'kec_nama' => 'Mantrijeron'],
            ['id' => 9, 'kab_id' => 5, 'kec_kode' => '09', 'kec_nama' => 'Mergangsan'],
            ['id' => 10, 'kab_id' => 5, 'kec_kode' => '10', 'kec_nama' => 'Ngampilan'],
            ['id' => 11, 'kab_id' => 5, 'kec_kode' => '11', 'kec_nama' => 'Pakualaman'],
            ['id' => 12, 'kab_id' => 5, 'kec_kode' => '12', 'kec_nama' => 'Tegalrejo'],
            ['id' => 13, 'kab_id' => 5, 'kec_kode' => '13', 'kec_nama' => 'Umbulharjo'],
            ['id' => 14, 'kab_id' => 5, 'kec_kode' => '14', 'kec_nama' => 'Wirobrajan'],
        ]);

        // Seed Kelurahan
        DB::table('wil_kel')->insert([
            ['id' => 1, 'kec_id' => 1, 'kel_kode' => '0101', 'kel_nama' => 'Bausaran'],
            ['id' => 2, 'kec_id' => 1, 'kel_kode' => '0102', 'kel_nama' => 'Suryatmajan'],
            ['id' => 3, 'kec_id' => 1, 'kel_kode' => '0103', 'kel_nama' => 'Tegalpanggung'],
            ['id' => 4, 'kec_id' => 2, 'kel_kode' => '0201', 'kel_nama' => 'Pringgokusuman'],
            ['id' => 5, 'kec_id' => 2, 'kel_kode' => '0202', 'kel_nama' => 'Sosromenduran'],
            ['id' => 6, 'kec_id' => 3, 'kel_kode' => '0301', 'kel_nama' => 'Baciro'],
            ['id' => 7, 'kec_id' => 3, 'kel_kode' => '0302', 'kel_nama' => 'Demangan'],
            ['id' => 8, 'kec_id' => 3, 'kel_kode' => '0303', 'kel_nama' => 'Klitren'],
            ['id' => 9, 'kec_id' => 3, 'kel_kode' => '0304', 'kel_nama' => 'Kotabaru'],
            ['id' => 10, 'kec_id' => 3, 'kel_kode' => '0305', 'kel_nama' => 'Terban'],
            ['id' => 11, 'kec_id' => 4, 'kel_kode' => '0401', 'kel_nama' => 'Ngupasan'],
            ['id' => 12, 'kec_id' => 4, 'kel_kode' => '0402', 'kel_nama' => 'Prawrodirjan'],
            ['id' => 13, 'kec_id' => 5, 'kel_kode' => '0501', 'kel_nama' => 'Bumijo'],
            ['id' => 14, 'kec_id' => 5, 'kel_kode' => '0502', 'kel_nama' => 'Cokrodiningrat'],
            ['id' => 15, 'kec_id' => 5, 'kel_kode' => '0503', 'kel_nama' => 'Gowongan'],
            ['id' => 16, 'kec_id' => 6, 'kel_kode' => '0601', 'kel_nama' => 'Prenggan'],
            ['id' => 17, 'kec_id' => 6, 'kel_kode' => '0602', 'kel_nama' => 'Purbayan'],
            ['id' => 18, 'kec_id' => 6, 'kel_kode' => '0603', 'kel_nama' => 'Rejowinangun'],
            ['id' => 19, 'kec_id' => 7, 'kel_kode' => '0701', 'kel_nama' => 'Kadipaten'],
            ['id' => 20, 'kec_id' => 7, 'kel_kode' => '0702', 'kel_nama' => 'Panembahan'],
            ['id' => 21, 'kec_id' => 7, 'kel_kode' => '0703', 'kel_nama' => 'Patehan'],
            ['id' => 22, 'kec_id' => 8, 'kel_kode' => '0801', 'kel_nama' => 'Gedongkiwo'],
            ['id' => 23, 'kec_id' => 8, 'kel_kode' => '0802', 'kel_nama' => 'Mantrijeron'],
            ['id' => 24, 'kec_id' => 8, 'kel_kode' => '0803', 'kel_nama' => 'Suryodiningratan'],
            ['id' => 25, 'kec_id' => 9, 'kel_kode' => '0901', 'kel_nama' => 'Brontokusuman'],
            ['id' => 26, 'kec_id' => 9, 'kel_kode' => '0902', 'kel_nama' => 'Keparakan'],
            ['id' => 27, 'kec_id' => 9, 'kel_kode' => '0903', 'kel_nama' => 'Wirogunan'],
            ['id' => 28, 'kec_id' => 10, 'kel_kode' => '1001', 'kel_nama' => 'Ngampilan'],
            ['id' => 29, 'kec_id' => 10, 'kel_kode' => '1002', 'kel_nama' => 'Notoprajan'],
            ['id' => 30, 'kec_id' => 11, 'kel_kode' => '1101', 'kel_nama' => 'Gunungketur'],
            ['id' => 31, 'kec_id' => 11, 'kel_kode' => '1102', 'kel_nama' => 'Purwokinanti'],
            ['id' => 32, 'kec_id' => 12, 'kel_kode' => '1201', 'kel_nama' => 'Bener'],
            ['id' => 33, 'kec_id' => 12, 'kel_kode' => '1202', 'kel_nama' => 'Karangwaru'],
            ['id' => 34, 'kec_id' => 12, 'kel_kode' => '1203', 'kel_nama' => 'Kricak'],
            ['id' => 35, 'kec_id' => 12, 'kel_kode' => '1204', 'kel_nama' => 'Tegalrejo'],
            ['id' => 36, 'kec_id' => 13, 'kel_kode' => '1301', 'kel_nama' => 'Giwangan'],
            ['id' => 37, 'kec_id' => 13, 'kel_kode' => '1302', 'kel_nama' => 'Mujamuju'],
            ['id' => 38, 'kec_id' => 13, 'kel_kode' => '1303', 'kel_nama' => 'Pandeyan'],
            ['id' => 39, 'kec_id' => 13, 'kel_kode' => '1304', 'kel_nama' => 'Semaki'],
            ['id' => 40, 'kec_id' => 13, 'kel_kode' => '1305', 'kel_nama' => 'Sorosutan'],
            ['id' => 41, 'kec_id' => 13, 'kel_kode' => '1306', 'kel_nama' => 'Tahunan'],
            ['id' => 42, 'kec_id' => 13, 'kel_kode' => '1307', 'kel_nama' => 'Warungboto'],
            ['id' => 43, 'kec_id' => 14, 'kel_kode' => '1401', 'kel_nama' => 'Pakuncen'],
            ['id' => 44, 'kec_id' => 14, 'kel_kode' => '1402', 'kel_nama' => 'Patangpuluh'],
            ['id' => 45, 'kec_id' => 14, 'kel_kode' => '1403', 'kel_nama' => 'Wirobrajan'],
        ]);
    }
}
