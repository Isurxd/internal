<?php

namespace App\Models;

use App\Models\Keluar;
use App\Models\Masuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $filleable = ['nama', 'merek', 'stok'];
    public $timestamps = true;

    public function historyBarang()
    {
        return $this->hasMany(HistoryBarang::class, 'barang_id');
    }
    public function masuk()
    {
        return $this->hasMany(Masuk::class, 'barang_id');
    }
    public function keluar()
    {
        return $this->hasMany(keluar::class, 'id_keluar');
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_peminjaman');
    }
    //  public function kembali()
    // {
    //     return $this->hasMany(kembali::class, 'id_kembali');
    // }
}
