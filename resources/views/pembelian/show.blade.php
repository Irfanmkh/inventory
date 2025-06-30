@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.pembelian.index') }}">Pembelian</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal Pembelian</th>
                        <td>{{ $pembelian->tanggal_pembelian }}</td>
                    </tr>
                    <tr>
                        <th>Nama Produk</th>
                        <td>{{ $pembelian->produk->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pemasok</th>
                        <td>{{ $pembelian->pemasok->nama_pemasok ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $pembelian->jumlah_pesanan }}</td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td style="
                                @if ($pembelian->status === 'Tertunda') background-color: orange; color: black;
                                @elseif ($pembelian->status === 'Selesai') background-color: green; color: white;
                                @elseif ($pembelian->status === 'Dibatalkan') background-color: red; color: white;
                                @endif
                            ">
                            {{ $pembelian->status }}
                        </td>
                    </tr>
                </table>

                <a href="{{ route('admin.pembelian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection