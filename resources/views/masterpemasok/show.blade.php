@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Pemasok</h1>
    <div class="card mb-4">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nama Pemasok</dt>
                <dd class="col-sm-9">{{ $masterpemasok->nama_pemasok }}</dd>

                <dt class="col-sm-3">Lokasi</dt>
                <dd class="col-sm-9">{{ $masterpemasok->lokasi_pemasok }}</dd>

                <dt class="col-sm-3">Kontak</dt>
                <dd class="col-sm-9">{{ $masterpemasok->kontak }}</dd>

                <dt class="col-sm-3">Produk</dt>
                <dd class="col-sm-9">{{ $masterpemasok->produk }}</dd>

                <dt class="col-sm-3">Dibuat Pada</dt>
                <dd class="col-sm-9">{{ $masterpemasok->dibuat_pada }}</dd>

                <dt class="col-sm-3">Diperbarui Pada</dt>
                <dd class="col-sm-9">{{ $masterpemasok->diperbarui_pada }}</dd>
            </dl>
            <a href="{{ route('masterpemasok.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection