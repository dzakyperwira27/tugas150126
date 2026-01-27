<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Anggota;

class Masuk extends Model
{
    //use HasFactory;
    protected $table = 'masuk';

    protected $fillable = [
        'anggota_id', 
        'barang_id', 
        'jumlah_masuk', 
        'tanggal_masuk',
    ];

    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
