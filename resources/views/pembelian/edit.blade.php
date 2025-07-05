@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Data Pembelian</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Data Pembelian
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pembelian.update', $pembelian->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="tanggal_pembelian">Tanggal Pembelian:</label>
                        <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror"
                            id="tanggal_pembelian" name="tanggal_pembelian"
                            value="{{ old('tanggal_pembelian', date('Y-m-d', strtotime($pembelian->tanggal_pembelian))) }}">


                        @error('tanggal_pembelian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pemasok_id">Pemasok:</label>
                        <select class="form-control @error('pemasok_id') is-invalid @enderror" id="pemasok_id"
                            name="pemasok_id">
                            <option value="">-- Pilih Pemasok --</option>
                            @foreach ($pemasoks as $pemasok)
                                <option value="{{ $pemasok->id }}" {{ old('pemasok_id', $pembelian->pemasok_id) == $pemasok->id ? 'selected' : '' }}>
                                    {{ $pemasok->nama_pemasok }}
                                </option>
                            @endforeach
                        </select>
                        @error('pemasok_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk:</label>
                        <input type="text" class="form-control @error('') is-invalid @enderror" id="nama_produk"
                            name="nama_produk" value="{{ old('nama_produk', $pembelian->nama_produk) }}">

                        @error('nama_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pesanan">Jumlah Pesanan:</label>
                        <input type="number" required class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                            id="jumlah_pesanan" name="jumlah_pesanan"
                            value="{{ old('jumlah_pesanan', $pembelian->jumlah_pesanan) }}">
                        @error('jumlah_pesanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan:</label>
                        <input type="number" step="0.01" required
                            class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan"
                            name="harga_satuan" value="{{ old('harga_satuan', $pembelian->harga_satuan ?? '') }}">
                        @error('harga_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="total_harga">Total Harga:</label>
                        <input type="number" step="0.01" class="form-control @error('total_harga') is-invalid @enderror"
                            id="total_harga" name="total_harga" value="{{ old('total_harga') }}" readonly>
                        @error('total_harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="">-- Pilih Status --</option>
                            <option value="Tertunda" {{ old('status', $pembelian->status) == 'Tertunda' ? 'selected' : '' }}>
                                Tertunda</option>
                            <option value="Selesai" {{ old('status', $pembelian->status) == 'Selesai' ? 'selected' : '' }}>
                                Selesai</option>
                            <option value="Dibatalkan" {{ old('status', $pembelian->status) == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                    <a href="{{ route('admin.pembelian.index') }}" class="btn btn-secondary mt-4">Kembali</a>
                </form>
            </div>
        </div>
    </div>


    {{-- Script untuk update otomatis total harga --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jumlahInput = document.getElementById('jumlah_pesanan');
            const hargaInput = document.getElementById('harga_satuan');
            const totalInput = document.getElementById('total_harga');

            function updateTotal() {
                const jumlah = parseFloat(jumlahInput.value) || 0;
                const harga = parseFloat(hargaInput.value) || 0;
                totalInput.value = (jumlah * harga).toFixed(2);
            }

            jumlahInput.addEventListener('input', updateTotal);
            hargaInput.addEventListener('input', updateTotal);
        });
    </script>
@endsection