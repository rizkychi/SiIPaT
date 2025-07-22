<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenaraKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('menara_kategori')->insert([
            ['kategori_kode' => 'gf', 'kategori_nama' => 'Menara Mandiri Greenfield'],
            ['kategori_kode' => 'rt', 'kategori_nama' => 'Menara Mandiri Rooftop'],
            ['kategori_kode' => 'trg', 'kategori_nama' => 'Menara Teregang'],
            ['kategori_kode' => 'monopole', 'kategori_nama' => 'Menara Tunggal'],
            ['kategori_kode' => 'mcp', 'kategori_nama' => 'Tiang Microcell'],
        ]);
    }
}
