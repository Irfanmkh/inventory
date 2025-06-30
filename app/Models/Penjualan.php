<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'jumlah_terjual',
        'total_harga',
        'status',
        'tanggal_penjualan'
    ];

    public function produk()
    {
        return $this->belongsTo(MasterProduk::class, 'produk_id');
    }
}
