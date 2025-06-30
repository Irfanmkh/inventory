@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Penjualan</h1>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ url('/penjualan/'.$penjualan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="produk_id" class="form-label">Produk</label>
                    <select name="produk_id" class="form-control" required>
                        @foreach($produks as $p)
                        <option value="{{ $p->id }}" {{ $p->id == $penjualan->produk_id ? 'selected' : '' }}>{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                    <input type="number" name="jumlah_terjual" class="form-control" value="{{ $penjualan->jumlah_terjual }}" required>
                </div>
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" name="total_harga" class="form-control" value="{{ $penjualan->total_harga }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Sukses" {{ $penjualan->status == 'Sukses' ? 'selected' : '' }}>Sukses</option>
                        <option value="Pending" {{ $penjualan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Gagal" {{ $penjualan->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                    <input type="date" name="tanggal_penjualan" class="form-control" value="{{ $penjualan->tanggal_penjualan }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection