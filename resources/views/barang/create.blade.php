{{-- @extends('layouts.backend')
@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit barang {{ $barang->nama }}</h5>
                <form class="row g-3" method="POST" action="{{ route('barang.update', $barang->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" value="{{ $barang->nama }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" class="form-control" name="merek" value="{{ $barang->merek }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" value="{{ $barang->stok }}"
                            min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal barang</label>
                        <input type="date" class="form-control" name="tanggal_barang" value="{{ $barang->tanggal_barang }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{ $barang->keterangan }}">
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
@endsection --}}

<link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
<!-- loader-->
<link href="{{ asset('assets/css/pace.min.css" rel="stylesheet') }}">
<script src="{{ asset('assets/js/pace.min.js') }}"></script>

<!--plugins-->
<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.cs')}}s" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">
<!--bootstrap css-->
<link href="{{ asset('assets/css/bootstrap.min.css" rel="stylesheet') }}">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
<!--main css-->
<link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
<link href="{{ 'sass/main.css' }}" rel="stylesheet">
<link href="{{ 'sass/dark-theme.css' }}" rel="stylesheet">
<link href="{{ 'sass/blue-theme.css' }}" rel="stylesheet">
<link href="{{ 'sass/semi-dark.css' }}" rel="stylesheet">
<link href="{{ 'sass/bordered-theme.css' }}" rel="stylesheet">
<link href="{{ 'sass/responsive.css' }}" rel="stylesheet">

@extends('layouts.backend')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-12">
                    <h1 class="page-header">Tambah data barang</h1>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('barang.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" name="nama">
                                                <label class="form-label">Merek</label>
                                                <input type="text" class="form-control" name="merek">
                                                <label class="form-label">Stok</label>
                                                <input type="number" class="form-control" name="stok" value="0" placeholder="0">
                                                <br>
                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <button type="submit"
                                                            class="btn btn-grd-primary px-4 text-white">Submit</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--bootstrap js-->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(".datepicker").flatpickr();

    $(".time-picker").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-time").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    $(".date-format").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-range").flatpickr({
        mode: "range",
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    $(".date-inline").flatpickr({
        inline: true,
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });
</script>
<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

