@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Retur Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Retur Barang</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">Tambah Retur</div>
        <div class="card-body">
            <form action="{{ route('admin.retur.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="produk_id">Produk:</label>
                    <select name="produk_id" class="form-control">
                        @foreach($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control" required value="{{ old('jumlah') }}">
                </div>

                <div class="form-group">
                    <label for="alasan">Alasan Retur:</label>
                    <textarea name="alasan" class="form-control" required>{{ old('alasan') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tanggal_retur">Tanggal Retur:</label>
                    <input type="date" name="tanggal_retur" class="form-control" value="{{ old('tanggal_retur') }}">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                <a href="{{ route('admin.retur.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection