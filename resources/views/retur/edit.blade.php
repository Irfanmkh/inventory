@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Retur Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Retur</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">Form Edit Retur Barang</div>
        <div class="card-body">
            <form action="{{ route('retur.update', $retur->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="produk_id">Produk:</label>
                    <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                        @foreach($produks as $produk)
                        <option value="{{ $produk->id }}" {{ $produk->id == $retur->produk_id ? 'selected' : '' }}>{{ $produk->nama }}</option>
                        @endforeach
                    </select>
                    @error('produk_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah', $retur->jumlah) }}">
                    @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alasan">Alasan Retur:</label>
                    <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror">{{ old('alasan', $retur->alasan) }}</textarea>
                    @error('alasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_retur">Tanggal Retur:</label>
                    <input type="date" name="tanggal_retur" class="form-control @error('tanggal_retur') is-invalid @enderror" value="{{ old('tanggal_retur', $retur->tanggal) }}">
                    @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update</button>
                <a href="{{ route('retur.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection