<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    protected $filleable = ['nama', 'merek', 'jumlah', 'tanggal_masuk', 'keterangan'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
