<?php

// database/seeders/PenjualanSeeder.php

namespace Database\Seeders;

use App\Models\Penjualan;
use App\Models\MasterProduk;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $produk = MasterProduk::first(); // ambil satu produk untuk relasi

        if (!$produk) {
            $produk = MasterProduk::create([
                'nama' => 'Produk Dummy',
                'jenis' => 'Elektronik',
                'deskripsi' => 'Contoh produk untuk testing',
                'harga_jual' => 150000,
                'harga_beli' => 100000,
            ]);
        }

        for ($i = 0; $i < 30; $i++) {
            Penjualan::create([
                'produk_id' => $produk->id,
                'jumlah_terjual' => rand(1, 10),
                'total_harga' => rand(100000, 500000),
                'tanggal_penjualan' => now()->subDays(30 - $i),
                'status' => 'Selesai'
            ]);
        }
    }
}
