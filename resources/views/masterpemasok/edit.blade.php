@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Data Pemasok
            </div>
            <div class="card-body">
                <form action="{{ route('admin.masterpemasok.update', $masterpemasok->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_pemasok">Nama Pemasok:</label>
                        <input type="text" class="form-control @error('nama_pemasok') is-invalid @enderror"
                            id="nama_pemasok" name="nama_pemasok"
                            value="{{ old('nama_pemasok', $masterpemasok->nama_pemasok) }}">
                        @error('nama_pemasok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lokasi_pemasok">Lokasi:</label>
                        <input type="text" class="form-control @error('lokasi_pemasok') is-invalid @enderror"
                            id="lokasi_pemasok" name="lokasi_pemasok"
                            value="{{ old('lokasi_pemasok', $masterpemasok->lokasi_pemasok) }}">
                        @error('lokasi_pemasok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kontak">Kontak:</label>
                        <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak"
                            name="kontak" value="{{ old('kontak', $masterpemasok->kontak) }}">
                        @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="produk">Produk:</label>
                        <input type="text" class="form-control @error('produk') is-invalid @enderror" id="produk"
                            name="produk" value="{{ old('produk', $masterpemasok->produk) }}">
                        @error('produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                    <a href="{{ route('admin.masterpemasok.index') }}" class="btn btn-secondary mt-4">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection