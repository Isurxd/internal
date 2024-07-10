@extends('layouts.backend')
@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Masuk {{ $history_barang->nama }}</h5>
                <form class="row g-3" method="POST" action="{{ route('history_barang.update', $history_barang->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Barang</label>
                        <select name="barang_id" class="form-control">
                            @foreach ($barang as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $history_barang->barang_id ? 'selected' : '' }}>{{ $data->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="peminjaman" {{ $history_barang->status == 'peminjaman' ? 'selected' : '' }}>dipinjam
                            </option>
                            <option value="pengembalian" {{ $history_barang->status == 'pengembalian' ? 'selected' : '' }}>dikembalikan
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="jumlah" min="1"
                            value="{{ $history_barang->jumlah }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan"
                            value="{{ $history_barang->keterangan }}">
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
