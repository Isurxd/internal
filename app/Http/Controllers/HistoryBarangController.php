<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\HistoryBarang;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class HistoryBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history_barangs = HistoryBarang::with('barang')->latest()->get();
        return view('history_barang.index', compact('history_barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('history_barang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);

        $barang = Barang::find($request->barang_id);
        if ($request->status == 'pengembalian') {
            $barang->stok = $barang->stok + $request->jumlah;
            $barang->save();
        } else {
            if ($barang->stok < $request->jumlah) {
                return redirect()->route('history_barang.index')->with('error', 'Stok Tidak Cukup');
            } else {

                $history_barang = new HistoryBarang();
                $history_barang->barang_id = $request->barang_id;
                $history_barang->status = $request->status;
                $history_barang->jumlah = $request->jumlah;
                $history_barang->keterangan = $request->keterangan;
                $history_barang->save();

                $barang->stok = $barang->stok - $request->jumlah;
                $barang->save();
            }
        }

        return redirect()->route('history_barang.index')->with('success', 'Data Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoryBarang  $historyBarang
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryBarang $historyBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoryBarang  $historyBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $history_barang = HistoryBarang::findOrFail($id);
        $barang = Barang::all();
        return view('history_barang.edit', compact('history_barang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoryBarang  $historyBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'status' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ]);

        $history_barang = HistoryBarang::findOrFail($id);
        $barang = Barang::findOrFail($history_barang->barang_id);
        if ($history_barang->status == 'peminjaman') {
            $barang->stok -= $history_barang->jumlah;
        } else {
            $barang->stok += $history_barang->jumlah;
        }
        $barang->save();

        $history_barang->barang_id = $request->barang_id;
        $history_barang->status = $request->status;
        $history_barang->jumlah = $request->jumlah;
        $history_barang->keterangan = $request->keterangan;
        $history_barang->save();

        $barang = Barang::find($request->barang_id);
        if ($request->status == 'pengembalian') {
            $barang->stok = $barang->stok + $request->jumlah;
        } else {
            $barang->stok = $barang->stok - $request->jumlah;
        }
        $barang->save();

        return redirect()->route('history_barang.index')->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoryBarang  $historyBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history_barang = HistoryBarang::findOrFail($id);

        $barang = Barang::findOrFail($history_barang->barang_id);

        // if ($history_barang->status == 'pengembalian') {
        //     $barang->stok -= $history_barang->jumlah;
        // } else {
        //     $barang->stok += $history_barang->jumlah;
        // }

        $barang->save();

        $history_barang->delete();
        return redirect()->route('history_barang.index')->with('success', 'Data berhasil Dihapus');
    }

    // public function downloadPdf()
    // {
    //     // $barang = Barang::all();
    //     // $pdf = PDF::loadView('export_pdf');
    //     // return $pdf->stream('barang.pdf');

    //     $data = ['title' => 'Welcome to Laravel PDF Generation'];

    //     $pdf = PDF::loadView('myPDF', $data);

    //     return $pdf->download('myPDF.pdf');

    // }
}
