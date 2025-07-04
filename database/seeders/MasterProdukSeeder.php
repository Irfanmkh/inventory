<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('master_produks')->insert([
            [
                'nama' => 'Produk 1',
                'jenis' => 'Elektronik',
                'jumlah' => '5',
                'harga_jual' => 1000000.00,
                'harga_beli' => 800000.00,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Produk 2',
                'jenis' => 'Pakaian',
                'jumlah' => '5',
                'harga_jual' => 200000.00,
                'harga_beli' => 150000.00,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Produk 3',
                'jenis' => 'Peralatan Rumah Tangga',
                'jumlah' => '5',
                'harga_jual' => 300000.00,
                'harga_beli' => 250000.00,
                'foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
