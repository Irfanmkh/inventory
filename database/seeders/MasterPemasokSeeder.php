<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MasterPemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_pemasoks')->insert([
            [
                'nama_pemasok'   => 'Pemasok Elektronik A',
                'lokasi_pemasok' => 'Jakarta',
                'kontak'         => '081234567890',
                'produk'         => 'Produk 1',
                'dibuat_oleh'    => 'Admin',
                'dibuat_pada'    => Carbon::now(),
                'diperbarui_pada' => Carbon::now(),
            ],
            [
                'nama_pemasok'   => 'Pemasok Pakaian B',
                'lokasi_pemasok' => 'Bandung',
                'kontak'         => '081298765432',
                'produk'         => 'Produk 2',
                'dibuat_oleh'    => 'Admin',
                'dibuat_pada'    => Carbon::now(),
                'diperbarui_pada' => Carbon::now(),
            ],
            [
                'nama_pemasok'   => 'Pemasok Rumah Tangga C',
                'lokasi_pemasok' => 'Surabaya',
                'kontak'         => '089812345678',
                'produk'         => 'Produk 3',
                'dibuat_oleh'    => 'Admin',
                'dibuat_pada'    => Carbon::now(),
                'diperbarui_pada' => Carbon::now(),
            ],
        ]);
    }
}
