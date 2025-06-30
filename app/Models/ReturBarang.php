<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    protected $fillable = [

        'produk_id',
        'jumlah',
        'alasan',
        'tanggal_retur',
    ];

    public function produk()
    {
        return $this->belongsTo(MasterProduk::class, 'produk_id');
    }
}
