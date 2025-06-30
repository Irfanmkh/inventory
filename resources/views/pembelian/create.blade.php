@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pembelian</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.pembelian.index') }}">Pembelian</a></li>
            <li class="breadcrumb-item active">Tambah Data Pembelian</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Data Pembelian
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pembelian.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="tanggal_pembelian">Tanggal Pembelian:</label>
                        <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror"
                            id="tanggal_pembelian" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}">
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
                                <option value="{{ $pemasok->id }}">
                                    {{ $pemasok->nama_pemasok }}
                                </option>
                            @endforeach
                        </select>
                        @error('pemasok_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="produk">Nama Barang:</label>
                        <input type="text" class="form-control @error('produk') is-invalid @enderror" id="produk"
                            name="produk" value="{{ old('produk') }}">
                        @error('produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            name="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan:</label>
                        <input type="number" step="0.01" class="form-control @error('harga_satuan') is-invalid @enderror"
                            id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}">
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
                            <option value="Tertunda" {{ old('status') == 'Tertunda' ? 'selected' : '' }}>Tertunda</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                    <a href="{{ route('admin.pembelian.index') }}" class="btn btn-secondary mt-4">Kembali</a>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const jumlahInput = document.getElementById('jumlah');
                        const hargaSatuanInput = document.getElementById('harga_satuan');
                        const totalHargaInput = document.getElementById('total_harga');

                        function updateTotalHarga() {
                            const jumlah = parseFloat(jumlahInput.value) || 0;
                            const hargaSatuan = parseFloat(hargaSatuanInput.value) || 0;
                            const total = jumlah * hargaSatuan;
                            totalHargaInput.value = total.toFixed(2);
                        }

                        jumlahInput.addEventListener('input', updateTotalHarga);
                        hargaSatuanInput.addEventListener('input', updateTotalHarga);
                    });
                </script>

            </div>
        </div>
    </div>
@endsection