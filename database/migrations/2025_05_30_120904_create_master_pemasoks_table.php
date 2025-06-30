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
        Schema::create('master_pemasoks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemasok');
            $table->string('lokasi_pemasok');
            $table->string('kontak')->nullable();
            $table->string('produk')->nullable(); // Jika ingin menyimpan dalam bentuk teks/daftar, gunakan string atau json
            $table->string('dibuat_oleh')->nullable(); // Nama user/admin yang membuat
            $table->timestamp('dibuat_pada')->nullable(); // Jika kamu tidak pakai timestamps default
            $table->timestamp('diperbarui_pada')->nullable(); // Jika kamu tidak pakai timestamps default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pemasoks');
    }
};
