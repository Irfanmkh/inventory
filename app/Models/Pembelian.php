<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'produk_id',
        'jumlah_pesanan',
        'jumlah_diterima',
        'pemasok_id',
        'tanggal_pembelian',
        'total_harga',
        'status',
        'riwayat_pesanan'
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(MasterProduk::class);
    }

    // Relasi ke Pemasok
    public function pemasok()
    {
        return $this->belongsTo(MasterPemasok::class);
    }

    // Relasi ke User (yang memesan)

}
