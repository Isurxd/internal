<?php

namespace App\Http\Controllers;

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
        // $barang = Barang::count();
        // $masuk = Masuk::count();
        // $keluar = Keluar::count();
        // $peminjaman = Peminjaman::count();
        // $pengembalian = Pengembalian::count();

        // return view('home', compact('barang', 'masuk', 'keluar', 'peminjaman', 'pengeluaran'));
    }

    // {
    //     return view('/admin');
    // }
}
