@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah data
            </div>
            <div class="card-body">
                <form action="{{ route('admin.masterproduk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" required class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}">

                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis:</label>
                        <input type="text" required class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                            name="jenis" value="{{ old('jenis') }}">

                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_beli">Harga Beli:</label>
                        <input type="text" required class="form-control @error('harga_beli') is-invalid @enderror"
                            id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}">

                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual:</label>
                        <input type="text" required class="form-control @error('harga_jual') is-invalid @enderror"
                            id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}">

                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="numeric" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            name="jumlah" value="{{ old('jumlah') }}" required>

                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Produk:</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>

                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection