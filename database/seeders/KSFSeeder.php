<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KSFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('ksf')->insert([
            ['ksf_zone' => 'core', 'ksf_nama' => 'Zona Inti'],
            ['ksf_zone' => 'buffer', 'ksf_nama' => 'Zona Penyangga'],
            ['ksf_zone' => 'wider', 'ksf_nama' => 'Zona Pengembangan'],
        ]);
    }
}
