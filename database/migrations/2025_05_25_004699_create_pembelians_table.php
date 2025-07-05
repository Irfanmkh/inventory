<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            // $table->foreignId('produk_id')->constrained('master_produks');
            $table->string('nama_produk');
            $table->foreignId('pemasok_id')->constrained('master_pemasoks');
            $table->integer('jumlah_pesanan');
            $table->integer('jumlah_diterima')->default(0);
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->string('status');
            $table->string('riwayat_pesanan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
