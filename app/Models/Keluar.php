<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluar extends Model
{
    use HasFactory;
    protected $filleable = ['nama', 'merek', 'jumlah', 'tanggal_keluar', 'keterangan'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
