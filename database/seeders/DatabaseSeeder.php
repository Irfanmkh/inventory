<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MasterProdukSeeder;
use Database\Seeders\MasterPemasokSeeder;
use Database\Seeders\PembelianSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            MasterProdukSeeder::class,
            MasterPemasokSeeder::class,
            PembelianSeeder::class,
        ]);



        $this->call(PenjualanSeeder::class);
        $this->call(PenggunaSeeder::class);
        $this->call(ReturBarangSeeder::class);
    }
}
