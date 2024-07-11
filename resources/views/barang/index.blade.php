@extends('layouts.backend')
@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <div class="col-lg-4 pb-4 ms-auto mt-3">
            <a href="{{ route('barang.create') }}" class="btn btn-success px-5 raised d-flex gap-5">
                <i class="bi bi-plus-circle"></i>
                Tambah barang
            </a>
            </div>
            {{-- <div class="col-lg-4 pb-4 ms-auto">
                <a href="{{ route('barang.download_pdf') }}" class="btn btn-primary px-5 raised d-flex gap-5">
                    <i class="bi bi-file-earmark-pdf"></i>
                    Download PDF
                </a>
            </div> --}}
            <table class="table mb-0 table-dark table-striped" id="example">
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

@if (session('success'))
        <script>
            Swal.fire({
                html: '<strong>{{ session('success') }}</strong>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1200
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                html: '<strong>{{ session('error') }}</strong>',
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            })
        </script>
    @endif
@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['pdf', 'excel']
                }
            }
        });
    </script>
@endpush
