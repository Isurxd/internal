@extends('layouts.backend')
@section('content')
    <h1>Dashboard</h1>
    <div class="col-xxl-12 d-flex align-items-stretch text-center">
        <div class="card w-100 rounded-4">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-12 col-xxl-12 mb-5">
                        <div class="d-flex align-items-center mb-1">
                            <div class="container justify-content-center">
                                <h1 class="mb-4 fw-semibold" style="text-align: center">Welcome</h1>
                                <h4 class="fw-semibold mb-0 fs-4 mb-0">Hello, {{ Auth::user()->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-4 w-100">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Barang</span></h5>
                        </div>
                        <p class="mb-4">Jumlah</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo">{{ $barang }}</h3>
                                <p class="mb-3">58% of sales target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h5 class="mb-0">Barang Masuk</span></h5>
                            </div>
                            <p class="mb-4">Jumlah</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h3 class="mb-0 text-indigo">{{$masuk}}</h3>
                                    <p class="mb-3">58% of sales target</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h5 class="mb-0">Barang Keluar</span></h5>
                            </div>
                            <p class="mb-4">Jumlah</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h3 class="mb-0 text-indigo">{{$keluar}}</h3>
                                    <p class="mb-3">58% of sales target</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h5 class="mb-0">Peminjaman</span></h5>
                            </div>
                            <p class="mb-4">Jumlah</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h3 class="mb-0 text-indigo">{{ $peminjaman }}</h3>
                                    <p class="mb-3">58% of sales target</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <h5 class="mb-0">Pengembalian</span></h5>
                            </div>
                            <p class="mb-4">Jumlah</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h3 class="mb-0 text-indigo">{{$pengembalian}}</h3>
                                    <p class="mb-3">58% of sales target</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
