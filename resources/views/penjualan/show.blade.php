@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Penjualan</h1>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Produk</th>
                        <td>{{ $penjualan->produk->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Terjual</th>
                        <td>{{ $penjualan->jumlah_terjual }}</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>{{ $penjualan->total_harga }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $penjualan->status }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <td>{{ $penjualan->tanggal_penjualan }}</td>
                    </tr>
                </table>
                <a href="{{ route('admin.penjualan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection