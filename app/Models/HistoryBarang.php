<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBarang extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
