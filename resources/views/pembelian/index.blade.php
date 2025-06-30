@extends('layouts.main')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{ route('pembelian.create') }}" class="btn btn-sm btn-primary">Tambah Pembelian</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pembelian</th>
                        <th>Nama Produk</th>
                        <th>Nama Pemasok</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembelian as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal_pembelian }}</td>
                        <td>{{ $item->produk->nama ?? '-' }}</td>
                        <td>{{ $item->pemasok->nama_pemasok ?? '-' }}</td>
                        <td>{{ $item->jumlah_pesanan }}</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('pembelian.show', $item->id) }}" class="btn btn-sm btn-secondary">Show</a>
                            <a href="{{ route('pembelian.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pembelian.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
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