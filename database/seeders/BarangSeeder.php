<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'Pulpen',
            'deskripsi' => 'Pulpen tinta hitam',
            'harga' => 3000
        ]);

        Barang::create([
            'nama_barang' => 'Buku Tulis',
            'deskripsi' => 'Buku tulis 38 lembar',
            'harga' => 5000
        ]);
    }
}
