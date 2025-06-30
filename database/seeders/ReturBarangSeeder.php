<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReturBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil salah satu ID dari master_produks
        $produk = DB::table('master_produks')->first();


        DB::table('retur_barangs')->insert([
            [
                'produk_id' => $produk->id,
                'jumlah' => 3,
                'alasan' => 'Barang rusak saat pengiriman',
                'tanggal_retur' => Carbon::now()->subDays(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => $produk->id,
                'jumlah' => 1,
                'alasan' => 'Kadaluarsa',
                'tanggal_retur' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
