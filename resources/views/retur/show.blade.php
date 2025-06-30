@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Retur Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Detail Retur</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">Informasi Retur Barang</div>
        <div class="card-body">
            <div class="mb-3">
                <label><strong>Produk:</strong></label>
                <p>{{ $returbarang->produk->nama }}</p>
            </div>

            <div class="mb-3">
                <label><strong>Jumlah:</strong></label>
                <p>{{ $returbarang->jumlah }}</p>
            </div>

            <div class="mb-3">
                <label><strong>Alasan Retur:</strong></label>
                <p>{{ $returbarang->alasan }}</p>
            </div>

            <div class="mb-3">
                <label><strong>Tanggal Retur:</strong></label>
                <p>{{ $returbarang->tanggal }}</p>
            </div>

            <a href="{{ route('retur.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection