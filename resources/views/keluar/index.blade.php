@extends('layouts.backend')
@section('content')
    <h6 class="mb-0 text-uppercase">ini adalah isi index Barang keluar</h6>
    <hr>
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-lg-4 pb-4 ms-auto">
            <a href="{{ route('keluar.create') }}" class="btn btn-success px-5 raised d-flex gap-5">
                <i class="bi bi-plus-circle"></i>
                Tambah Barang keluar
            </a>
        </div>
        <table class="table mb-0 table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Tanggal_keluar</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keluar as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->barang->nama }}</td>
                        <td>{{ $item->barang->merek }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <form action="{{ route('keluar.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td>
                                <a href="{{ route('keluar.edit', $item->id) }}"
                                    class="btn btn-grd btn-grd-primary px-5">Edit</a>
                                <button type="submit" class="btn btn-grd btn-grd-danger px-5"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                    Delete
                                </button>
                                </a>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
