@extends('layouts.backend')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    {{-- @include('layouts._flash') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form action="{{ route('report') }}" method="post">
                            @csrf
                            <div class="mb-4 form-group">
                                <label for="jenisLaporan">Jenis Laporan</label>
                                <select name="jenisLaporan" id="jenisLaporan" class="form-control">
                                    <option value="Barang Masuk">Barang Masuk</option>
                                    <option value="Barang Keluar">Barang Keluar</option>
                                    <option value="Pinjaman">Peminjaman</option>
                                    <option value="Pengembalian">Pengembalian</option>
                                </select>
                            </div>
                            <div class="mb-4 form-group">
                                <label for="tanggalAwal">Tanggal Awal</label>
                                <input type="date" name="tanggalAwal" id="tanggalAwal" class="form-control">
                            </div>
                            <div class="mb-4 form-group">
                                <label for="tanggalAkhir">Tanggal Akhir</label>
                                <input type="date" name="tanggalAkhir" id="tanggalAkhir" class="form-control">
                            </div>
                            <div class="mb-4 form-group">
                                <button class="btn btn-block btn-primary" type="submit">Search Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
