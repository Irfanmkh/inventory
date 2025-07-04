<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MasterPemasok extends Model
{
    use HasFactory;

    protected $table = 'master_pemasoks';

    protected $fillable = [
        'nama_pemasok',
        'lokasi_pemasok',
        'kontak',
        'produk',
        'dibuat_oleh',
        'dibuat_pada',
        'diperbarui_pada',
    ];

    public $timestamps = false; // Kita pakai versi kustom

    // Event handler otomatis saat create & update
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->dibuat_pada = Carbon::now();
            $model->diperbarui_pada = Carbon::now();
        });

        static::updating(function ($model) {
            $model->diperbarui_pada = Carbon::now();
        });
    }
    
}
