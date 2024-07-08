<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $filleable = ['nama', 'merek', 'jumlah', 'tanggal_pengembalian', 'keterangan'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
