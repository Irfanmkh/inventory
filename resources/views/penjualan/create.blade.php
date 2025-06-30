@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Penjualan</h1>

        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.penjualan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="produk_id" class="form-label">Produk</label>
                        <select name="produk_id" id="produk_id" class="form-control" required>

                            <option value="">-- Pilih Produk --</option>
                            @foreach($produks as $p)
                                <option value="{{ $p->id }}" data-harga="{{ $p->harga_jual }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_produk" class="form-label">Harga Produk</label>
                        <input type="number" id="harga_produk" name="harga_produk" class="form-control" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_terjual" class="form-label">Jumlah Terjual</label>
                        <input type="number" name="jumlah_terjual" id="jumlah_terjual" class="form-control" required>

                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" name="total_harga" id="total_harga" class="form-control" required>
                    </div>

                    {{-- <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Sukses">Sukses</option>
                            <option value="Pending">Pending</option>
                            <option value="Gagal">Gagal</option>
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
                        <input type="date" name="tanggal_penjualan" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.penjualan.index') }}" class="btn btn-secondary">Kembali</a>
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
    </script>


@endsection