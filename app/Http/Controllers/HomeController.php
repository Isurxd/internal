<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class HomeController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang = Barang::count('id');
        $masuk = Masuk::count('id');
        $keluar = Keluar::count('id');
        $peminjaman = Peminjaman::count('id');
        $pengembalian = Pengembalian::count('id');

        return view('home', compact('barang','masuk', 'keluar', 'peminjaman', 'pengeluaran'));
    }

    // {
    //     return view('/admin');
    // }
}
