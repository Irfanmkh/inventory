<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use App\Models\MasterProduk;
use App\Models\MasterPemasok;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PembelianSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada data produk & pemasok terlebih dahulu
        $masterproduk = MasterProduk::first();
        $masterpemasok = MasterPemasok::first();

        if (!$masterproduk || !$masterpemasok) {
            $this->command->warn("Seeder dihentikan. Pastikan ada minimal 1 produk & 1 pemasok di database.");
            return;
        }

        // Seed 5 data pembelian
        for ($i = 1; $i <= 5; $i++) {
            $jumlah = rand(1, 10);
            $harga_satuan = rand(5000, 20000);
            $total = $jumlah * $harga_satuan;

            Pembelian::create([
                'tanggal_pembelian' => Carbon::now()->subDays($i),
                'produk_id'         => $masterproduk->id,
                'pemasok_id'        => $masterpemasok->id,
                'jumlah_pesanan'    => $jumlah,
                'jumlah_diterima'   => rand(0, $jumlah),
                'total_harga'       => $total,
                'status'            => ['Tertunda', 'Selesai', 'Dibatalkan'][rand(0, 2)],
                'riwayat_pesanan'   => 'Pesanan otomatis #' . $i,
            ]);
        }
    }
}
