@extends('layouts.backend')
@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit peminjaman {{ $peminjaman->nama }}</h5>
                <form class="row g-3" method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                    @method('PATCH')
                    @csrf
                    <select name="barang_id" class="form-control">
                        <option value="" selected hidden>pilih data</option>
                        @foreach ($barang as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="jumlah" min="1" value="{{ $peminjaman->jumlah }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal peminjaman</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $peminjaman->keterangan }}">
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-grd-primary px-4 text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
