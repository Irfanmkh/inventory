@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Penjualan</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.penjualan.update', $penjualan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Produk</label>
                        <select name="produk_id" class="form-control" id="produk_id" required>
                            @foreach($produks as $p)
                                <option value="{{ $p->id }}" data-harga="{{ $p->harga_jual }}" {{ $p->id == $penjualan->produk_id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga Produk</label>
                        <input type="number" id="harga_produk" name="harga_produk" class="form-control" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                        <input type="number" name="jumlah_terjual" class="form-control" id="jumlah_terjual"
                            value="{{ $penjualan->jumlah_terjual }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" name="total_harga" class="form-control" id="total_harga"
                            value="{{ $penjualan->total_harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Pending" {{ $penjualan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Sukses" {{ $penjualan->status == 'Sukses' ? 'selected' : '' }}>Sukses</option>
                            <option value="Gagal" {{ $penjualan->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" name="tanggal_penjualan" class="form-control"
                            value="{{ $penjualan->tanggal_penjualan }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Simpan Perubahan</button>
                    <a href="{{ route('admin.penjualan.index') }}" class="btn btn-secondary mt-4">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        const produkSelect = document.getElementById('produk_id');
        const hargaInput = document.getElementById('harga_produk');
        const jumlahInput = document.getElementById('jumlah_terjual');
        const totalInput = document.getElementById('total_harga');

        function updateTotal() {
            const harga = parseFloat(hargaInput.value) || 0;
            const jumlah = parseFloat(jumlahInput.value) || 0;
            totalInput.value = harga * jumlah;
        }

        produkSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            hargaInput.value = harga || '';
            updateTotal();
        });

        jumlahInput.addEventListener('input', updateTotal);
        window.addEventListener('DOMContentLoaded', () => {
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            hargaInput.value = harga || '';
            updateTotal();
        });
    </script>
@endsection