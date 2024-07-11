@extends('layouts.backend')
@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
@endsection
@section('content')
    <h6 class="mb-0 text-uppercase">ini adalah isi index Barang Masuk</h6>
    <hr>
    <div class="card">
        <div class="col-lg-4 pb-4 ms-auto mt-3">
            <a href="{{ route('masuk.create') }}" class="btn btn-success px-5 raised d-flex gap-5">
                <i class="bi bi-plus-circle"></i>
                Tambah Barang masuk
            </a>
        </div>
        <table class="table mb-0 table-dark table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Tanggal_masuk</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masuk as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $item->barang->nama }}</td>
                        <td>{{ $item->barang->merek }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <form action="{{ route('masuk.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td>
                                <a href="{{ route('masuk.edit', $item->id) }}"
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
@endsection

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
