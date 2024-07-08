<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $filleable = ['nama', 'merek', 'jumlah', 'tanggal_peminjaman', 'keterangan'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
