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
            <div class="card rounded-2 w-100">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Barang Masuk</span></h5>
                        </div>
                        <p class="mb-4">Jumlah</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo">{{ $masuk1 }}</h3>
                                <p class="mb-3">58% of sales target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-2 w-100">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Barang Keluar</span></h5>
                        </div>
                        <p class="mb-4">Jumlah</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo">{{ $keluar1 }}</h3>
                                <p class="mb-3">58% of sales target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-2 w-100">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Peminjaman</span></h5>
                        </div>
                        <p class="mb-4">Jumlah</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo">{{ $history_barang }}</h3>
                                <p class="mb-3">58% of sales target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-2 w-100">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Pengembalian</span></h5>
                        </div>
                        <p class="mb-4">Jumlah</p>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo">{{ $history_barang }}</h3>
                                <p class="mb-3">58% of sales target</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card rounded-2 w-100">
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

        <div class="col-sm-9 d-flex align-items-stretch">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="chart">
                        <div class="">
                            <h5 class="mb-0">68.4K</h5>
                            <p class="mb-0">Barang Masuk</p>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('masuk.index') }}">Info</a></li>
                                {{-- <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
                <div class="d-flex align-items-start justify-content-between mb-1">
                    <div class="text-center">
                        {{-- <p class="mb-0 font-12">35K users increased from last month</p> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- end row --}}

        {{-- chart --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                        'Oktober', 'November', 'Desember'
                    ],
                    datasets: [{
                            label: 'Barang Masuk',
                            data: [
                                {{ $total_barang_masuk[1] }},
                                {{ $total_barang_masuk[2] }},
                                {{ $total_barang_masuk[3] }},
                                {{ $total_barang_masuk[4] }},
                                {{ $total_barang_masuk[5] }},
                                {{ $total_barang_masuk[6] }},
                                {{ $total_barang_masuk[7] }},
                                {{ $total_barang_masuk[8] }},
                                {{ $total_barang_masuk[9] }},
                                {{ $total_barang_masuk[10] }},
                                {{ $total_barang_masuk[11] }},
                                {{ $total_barang_masuk[12] }}
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Barang Keluar',
                            data: [
                                {{ $total_barang_keluar[1] }},
                                {{ $total_barang_keluar[2] }},
                                {{ $total_barang_keluar[3] }},
                                {{ $total_barang_keluar[4] }},
                                {{ $total_barang_keluar[5] }},
                                {{ $total_barang_keluar[6] }},
                                {{ $total_barang_keluar[7] }},
                                {{ $total_barang_keluar[8] }},
                                {{ $total_barang_keluar[9] }},
                                {{ $total_barang_keluar[10] }},
                                {{ $total_barang_keluar[11] }},
                                {{ $total_barang_keluar[12] }}
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection
