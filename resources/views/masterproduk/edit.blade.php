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
                Edit data
            </div>
            <div class="card-body">
                <form action="{{ route('admin.masterproduk.update', $id->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="pembelian_id">Pilih Produk:</label>
                        <select required class="form-control @error('pembelian_id') is-invalid @enderror" id="pembelian_id" name="pembelian_id">
                            <option value="">-- Pilih Produk --</option>
                            @foreach($pembelians as $pembelian)
                                <option value="{{ $pembelian->id }}" 
                                    data-harga="{{ $pembelian->harga_satuan }}"
                                    data-jumlah="{{ $pembelian->jumlah_pesanan }}"
                                    {{ old('pembelian_id') == $pembelian->id ? 'selected' : '' }}>
                                    {{ $pembelian->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                    
                        @error('pembelian_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis:</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                            value="{{ $id->jenis  }}">
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Deskripsi:</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" value="{{ $id->deskripsi  }}">
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual:</label>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual"
                            name="harga_jual" value="{{  $id->harga_jual }}">
                        @error('harga_jual')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli:</label>
                        <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli"
                            name="harga_beli" value="{{ $id->harga_beli }}">
                        @error('harga_beli')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="numeric" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            name="jumlah" value="{{ $id->jumlah }}">
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Produk:</label>
                        <input type="file" class="form-control" id="foto" name="foto">

                        {{-- @if(!empty($id->foto))
                        <img src="{{url('image')}}/{{$id->foto}}" alt="" class="rounded"
                            style="width: 100%; max-width: 100px; height: auto;">
                        @endif --}}
                        @if(isset($id->foto) && !empty($id->foto))
                            <img src="{{ url('image/' . $id->foto) }}" alt="Foto Produk" class="rounded"
                                style="width: 100%; max-width: 100px; height: auto;">
                        @else
                            <img src="{{ url('image/nophoto.jpg') }}" alt="No Foto" class="rounded"
                                style="width: 100%; max-width: 100px; height: auto;">
                        @endif

                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectProduk = document.getElementById('pembelian_id');
            const inputHargaBeli = document.getElementById('harga_beli');
            const inputJumlah = document.getElementById('jumlah');

            // Fungsi untuk update harga beli berdasarkan pilihan
            function updateHargaBeli() {
                const selectedOption = selectProduk.options[selectProduk.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                const maxJumlah = selectedOption.getAttribute('data-jumlah');
                inputHargaBeli.value = harga || '';
                inputJumlah.max = maxJumlah || '';
            }

            // Jalankan saat halaman pertama kali load
            updateHargaBeli();

            // Jalankan saat pilihan berubah
            selectProduk.addEventListener('change', updateHargaBeli);
        });
    </script>

@endsection