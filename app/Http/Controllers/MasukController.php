<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Masuk;
use Illuminate\Http\Request;

class MasukController extends Controller
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
        $masuk = Masuk::with('barang')->latest()->get();
        return view('masuk.index', compact('masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('masuk.create', compact('barang'));
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
            'tanggal_masuk' => 'required',
        ]);
        $masuk = new Masuk();
        $masuk->barang_id = $request->barang_id;
        $masuk->jumlah = $request->jumlah;
        $masuk->tanggal_masuk = $request->tanggal_masuk;
        $masuk->keterangan = $request->keterangan;
        $masuk->save();

        $barang = Barang::find($request->barang_id);
        $barang->stok = $barang->stok + $request->jumlah;
        $barang->save();
        return redirect()->route('masuk.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Masuk $masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masuk = Masuk::findOrFail($id);
        $barang = Barang::all();
        return view('masuk.edit', compact('masuk', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_masuk' => 'required',
        ]);
        $masuk = Masuk::findOrFail($id);
        $barang = Barang::findOrFail($masuk->barang_id);
        $barang->stok -= $masuk->jumlah;
        $barang->save();

        $masuk->barang_id = $request->barang_id;
        $masuk->jumlah = $request->jumlah;
        $masuk->tanggal_masuk = $request->tanggal_masuk;
        $masuk->keterangan = $request->keterangan;
        $masuk->save();

        $newbarang = Barang::findOrFail($masuk->barang_id);
        $newbarang->stok += $request->jumlah;
        $newbarang->save();

        return redirect()->route('masuk.index')->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masuk = Masuk::findOrFail($id);
        $barang = Barang::findOrFail($masuk->barang_id);
        $barang->stok -= $masuk->jumlah;
        $barang->save();

        $masuk->delete();
        return redirect()->route('masuk.index')->with('success', 'Data berhasil Dihapus');

    }
}
