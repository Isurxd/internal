@extends('layouts.backend')
@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="col-lg-4 pb-4 ms-auto">
            <a href="{{ route('barang.create') }}" class="btn btn-success px-5 raised d-flex gap-5">
                <i class="bi bi-plus-circle"></i>
                Tambah barang
            </a>
            </div>
            <div class="col-lg-4 pb-4 ms-auto">
                <a href="{{ route('barang.download_pdf') }}" class="btn btn-primary px-5 raised d-flex gap-5">
                    <i class="bi bi-file-earmark-pdf"></i>
                    Download PDF
                </a>
            </div>
            <table class="table mb-0 table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>{{ $item->stok }}</td>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <a href="{{ route('barang.edit', $item->id) }}"
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
