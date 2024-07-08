<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $peminjaman = Peminjaman::with('barang')->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('peminjaman.create', compact('barang'));
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
            'tanggal_peminjaman' => 'required',
        ]);
        $peminjaman = new Peminjaman();
        $peminjaman->barang_id = $request->barang_id;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->keterangan = $request->keterangan;
        $peminjaman->save();

        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return redirect()->route('peminjaman.index')->with('error', 'Stok Tidak Cukup');
        } else {
            $barang->stok = $barang->stok - $request->jumlah;
            $barang->save();
        }
        return redirect()->route('peminjaman.index')->with('success', 'Data Berhasil Ditambah');

        // $barang->stok = $barang->stok - $request->jumlah;
        // $barang->save();
        // return redirect()->route('peminjaman.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = Barang::all();
        return view('peminjaman.edit', compact('peminjaman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_peminjaman' => 'required',
        ]);
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = Barang::findOrFail($peminjaman->barang_id);
        $barang->stok -= $peminjaman->jumlah;
        $barang->save();

        $peminjaman->barang_id = $request->barang_id;
        $peminjaman->jumlah = $request->jumlah;
        $peminjaman->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjaman->keterangan = $request->keterangan;
        $peminjaman->save();

        $newbarang = Barang::findOrFail($peminjaman->barang_id);
        $newbarang->stok += $request->jumlah;
        $newbarang->save();

        return redirect()->route('peminjaman.index')->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barang = Barang::findOrFail($peminjaman->barang_id);
        $barang->stok += $peminjaman->jumlah;
        $barang->save();

        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil Dihapus');

    }
}
