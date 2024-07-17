<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function report(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        if ($start > $end) {
            // Alert::warning('Warning', 'Tanggal yang dimasukkan tidak sesuai');
            return redirect()->route('laporan.index')->with('Warning', 'Tanggal yang dimasukkan tidak sesuai');
            return back();
        }

        switch ($jenisLaporan) {
            case 'Barang Masuk':
                $query = Masuk::whereBetween('masuks.created_at', [$start, $end])
                    ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                    ->select('masuks.*', 'barangs.nama')
                    ->get();
                $total = Masuk::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Barang Keluar':
                $query = Keluar::whereBetween('keluars.created_at', [$start, $end])
                    ->join('barangs', 'keluars.barang_id', '=', 'barangs.id')
                    ->select('keluars.*', 'barangs.nama')
                    ->get();
                $total = Keluar::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Peminjaman':
                $query = Peminjaman::whereBetween('peminjamen.created_at', [$start, $end])
                    ->join('barangs', 'peminjamen.barang_id', '=', 'barangs.id')
                    ->select('peminjamen.*', 'barangs.nama')
                    ->get();
                $total = Peminjaman::whereBetween('created_at', [$start, $end])->count();
                break;

            case 'Pengembalian':
                $query = Pengembalian::whereBetween('pengembalians.created_at', [$start, $end])
                    ->join('barangs', 'pengembalians.barang_id', '=', 'barangs.id')
                    ->select('pengembalians.*', 'barangs.nama')
                    ->get();
                $total = Pengembalian::whereBetween('created_at', [$start, $end])->count();
                break;

            default:
                return redirect()->route('laporan.index')->with('Warning', 'Laporan Tidak Valid');
                return back();
        }

        return view('laporan.report', [
            'data' => $query,
            'total' => $total,
            'start' => $start,
            'end' => $end,
            'jenisLaporan' => $jenisLaporan,
        ]);
    }

    public function printReport(Request $request)
    {
        $start = $request->tanggalAwal;
        $end = $request->tanggalAkhir;
        $jenisLaporan = $request->jenisLaporan;

        switch ($jenisLaporan) {
            case 'Barang Masuk':
                $query = Masuk::whereBetween('masuks.created_at', [$start, $end])
                    ->join('barangs', 'masuks.barang_id', '=', 'barangs.id')
                    ->select('masuks.*', 'barangs.nama')
                    ->get();
                $total = Masuk::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Barang Keluar':
                $query = Keluar::whereBetween('keluars.created_at', [$start, $end])
                    ->join('barangs', 'keluars.barang_id', '=', 'barangs.id')
                    ->select('keluars.*', 'barangs.nama')
                    ->get();
                $total = Keluar::whereBetween('created_at', [$start, $end])->sum('jumlah');
                break;

            case 'Peminjaman':
                $query = Peminjaman::whereBetween('peminjamen.created_at', [$start, $end])
                    ->join('barangs', 'peminjamen.barang_id', '=', 'barangs.id')
                    ->select('peminjamen.*', 'barangs.nama')
                    ->get();
                $total = Peminjaman::whereBetween('created_at', [$start, $end])->count();
                break;

            case 'Pengembalian':
                $query = Pengembalian::whereBetween('pengembalians.created_at', [$start, $end])
                    ->join('barangs', 'pengembalians.barang_id', '=', 'barangs.id')
                    ->select('pengembalians.*', 'barangs.nama')
                    ->get();
                $total = Pengembalian::whereBetween('created_at', [$start, $end])->count();
                break;
        }

        $pdf = \PDF::loadView('laporan.report_pdf', compact('query', 'start', 'end', 'jenisLaporan', 'total'));
        return $pdf->download('laporan-' . $jenisLaporan . '.pdf');
    }
}
