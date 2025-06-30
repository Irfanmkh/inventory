<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduk extends Model
{
    use HasFactory;
    protected $table = 'master_produks';
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'harga_jual',
        'harga_beli',
        'jumlah',
        'foto'
    ];
}
