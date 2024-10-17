<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryBarang;
use App\Models\Keluar;
use App\Models\Masuk;
use Illuminate\Routing\Controller;

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
        $barang1 = Barang::count();
        $masuk1 = Masuk::count();
        $keluar1 = Keluar::count();
        $peminjaman = HistoryBarang::where('status', 'peminjaman')->count();
        $pengembalian = HistoryBarang::where('status', 'pengembalian')->count();
        // return view('home', compact('barang', 'masuk', 'keluar', 'historybarang', 'pengembalian'));

        // $user = Auth::user();
        // if ($user->isAdmin == 1) {
        //     return view('home');
        // } else {
        //     return view('user.pemasukan.index');
        // }

        $barang = Barang::all();
        $masuk = Masuk::all();
        $keluar = Keluar::all();
        // dd($masuk);

        $barang = Masuk::sum('jumlah') - Keluar::sum('jumlah');
        $allPemasukan = Masuk::sum('jumlah');
        $allPengeluaran = Keluar::sum('jumlah');

        $masukPemasukan = Masuk::select('jumlah')->get();
        $totalPemasukan = $masukPemasukan->sum('jumlah');
        $hasilPemasukan = $masukPemasukan->sum('jumlah');
        // dd($hasilPemasukan);

        $total_barang_masuk = [];
        for ($i = 1; $i <= 12; $i++) {
            $total_barang_masuk[$i] = Masuk::whereMonth('tanggal_masuk', $i)->sum('jumlah');
        }
        $total_barang_keluar = [];
        for ($i = 1; $i <= 12; $i++) {
            $total_barang_keluar[$i] = Keluar::whereMonth('tanggal_keluar', $i)->sum('jumlah');
        }
        return view('home', [
            'barang' => $barang,
            'masuk' => $masuk,
            'keluar' => $keluar,
            'barang1' => $barang1,
            'masuk1' => $masuk1,
            'keluar1' => $keluar1,
            'allPemasukan' => $allPemasukan,
            'allPengeluaran' => $allPengeluaran,
            'totalPemasukan' => $totalPemasukan,
            'hasilPemasukan' => $hasilPemasukan,
            'history_barang' => $peminjaman,
            'history_barang' => $pengembalian,
            'total_barang_masuk' => $total_barang_masuk,
            'total_barang_keluar' => $total_barang_keluar,
        ]);
    }
}
