@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.masterproduk.show', $id) }}">Master Produk</a></li>
            <li class="breadcrumb-item active">Detail Produk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-box me-1"></i>
                Informasi Produk
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nama Produk:</strong></div>
                    <div class="col-md-8">{{ $id->nama }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Jenis:</strong></div>
                    <div class="col-md-8">{{ $id->jenis }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Deskripsi:</strong></div>
                    <div class="col-md-8">{{ $id->deskripsi }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Harga Jual:</strong></div>
                    <div class="col-md-8">Rp{{ number_format($id->harga_jual, 0, ',', '.') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Harga Beli:</strong></div>
                    <div class="col-md-8">Rp{{ number_format($id->harga_beli, 0, ',', '.') }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Jumlah:</strong></div>
                    <div class="col-md-8">{{ $id->jumlah }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Foto Produk:</strong></div>
                    <div class="col-md-8">
                        @if(isset($id->foto) && !empty($id->foto))
                            <img src="{{ url('image/' . $id->foto) }}" alt="Foto Produk" class="img-thumbnail"
                                style="max-width: 150px;">
                        @else
                            <img src="{{ url('image/nophoto.jpg') }}" alt="No Foto" class="img-thumbnail"
                                style="max-width: 150px;">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.masterproduk.index') }}" class="btn btn-secondary">Kembali
                </a>
            </div>

        </div>
    </div>
@endsection