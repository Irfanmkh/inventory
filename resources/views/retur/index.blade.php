@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Retur Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Retur Barang</li>
    </ol>

    <a href="{{ route('admin.retur.create') }}" class="btn btn-primary mb-3">Tambah Retur</a>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Data Retur Barang
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Alasan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($returBarangs as $retur)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $retur->id }}</td>
                        <td>{{ $retur->produk->nama }}</td>
                        <td>{{ $retur->jumlah }}</td>
                        <td>{{ $retur->alasan }}</td>
                        <td>{{ $retur->tanggal_retur }}</td>
                        <td>
                            <a href="{{ route('admin.retur.show', $retur->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('admin.retur.edit', $retur->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.retur.destroy', $retur->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection