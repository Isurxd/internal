<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluar = Keluar::with('barang')->latest()->get();
        return view('keluar.index', compact('keluar'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('keluar.create', compact('barang'));

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
            'tanggal_keluar' => 'required',
        ]);

//  

        $barang = Barang::find($request->barang_id);
            if ($barang->stok < $request->jumlah) {
                return redirect()->route('keluar.index')->with('error', 'Stok Tidak Cukup');
            } else {

                $keluar = new Keluar();
                $keluar->barang_id = $request->barang_id;
                $keluar->jumlah = $request->jumlah;
                $keluar->tanggal_keluar = $request->tanggal_keluar;
                $keluar->keterangan = $request->keterangan;
                $keluar->save();

                $barang->stok = $barang->stok - $request->jumlah;
                $barang->save();
        }
        return redirect()->route('keluar.index')->with('success', 'Data Berhasil Ditambah');

    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'barang_id' => 'required',
    //         'jumlah' => 'required',
    //         'tanggal_keluar' => 'required',
    //     ]);
    //     $keluar = new Keluar();
    //     $keluar->barang_id = $request->barang_id;
    //     $keluar->jumlah = $request->jumlah;
    //     $keluar->tanggal_keluar = $request->tanggal_keluar;
    //     $keluar->keterangan = $request->keterangan;

    //     $barang = Barang::find($request->barang_id);
    //     if ($barang->stok < $request->jumlah) {
    //         return redirect()->route('keluar.index')->with('error', 'Stok Tidak Cukup');
    //     } else {
    //         $barang->stok = $barang->stok - $request->jumlah;
    //         $barang->save();
    //     }
    //     return redirect()->route('keluar.index')->with('success', 'Data Berhasil Ditambah');

    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Keluar $keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluar = Keluar::findOrFail($id);
        $barang = Barang::all();
        return view('keluar.edit', compact('keluar', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
        ]);
        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
                return redirect()->route('keluar.index')->with('error', 'Stok Tidak Cukup');
            } else {
        $keluar = Keluar::findOrFail($id);
        $barang = Barang::findOrFail($keluar->barang_id);
        $barang->stok -= $keluar->jumlah;
        $barang->save();

        $keluar->barang_id = $request->barang_id;
        $keluar->jumlah = $request->jumlah;
        $keluar->tanggal_keluar = $request->tanggal_keluar;
        $keluar->keterangan = $request->keterangan;
        $keluar->save();

        $newbarang = Barang::findOrFail($keluar->barang_id);
        $newbarang->stok += $request->jumlah;
        $newbarang->save();

        return redirect()->route('keluar.index')->with('success', 'Data Berhasil Diubah');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluar = Keluar::findOrFail($id);
        // $barang = Barang::findOrFail($keluar->barang_id);
        // $barang->stok += $keluar->jumlah;
        // $barang->save();

        $keluar->delete();
        return redirect()->route('keluar.index')->with('success', 'Data berhasil Dihapus');

    }
}
