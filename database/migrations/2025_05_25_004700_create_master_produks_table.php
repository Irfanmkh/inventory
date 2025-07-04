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
        Schema::create('master_produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('pembelian_id')->nullable()->constrained('pembelian')->onDelete('cascade');

            $table->string('jenis');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_jual', 10, 2);
            $table->decimal('harga_beli', 10, 2);
            $table->integer('jumlah')->default(0);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_produks');
    }
};
