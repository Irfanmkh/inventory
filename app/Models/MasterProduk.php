<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduk extends Model
{
    use HasFactory;
    protected $table = 'master_produks';
    protected $fillable = ['nama', 'jenis', 'deskripsi', 'harga_jual', 'harga_beli', 'jumlah', 'foto', 'pemasok_id'];

    public function pemasok()
    {
        return $this->belongsTo(MasterPemasok::class, 'pemasok_id');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pemasok_id');
    }
}
