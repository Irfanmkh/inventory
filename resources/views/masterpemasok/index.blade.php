@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Master Pemasok</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Master Pemasok</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('admin.masterpemasok.create') }}" class="btn btn-sm btn-primary">Tambah Pemasok</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemasok</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <th>Produk</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemasok</th>
                            <th>Lokasi</th>
                            <th>Kontak</th>
                            <th>Produk</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($masterpemasok as $pemasok)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemasok->nama_pemasok }}</td>
                                <td>{{ $pemasok->lokasi_pemasok }}</td>
                                <td>{{ $pemasok->kontak }}</td>
                                <td>{{ $pemasok->produk }}</td>
                                <td>
                                    <a href="{{ route('admin.masterpemasok.show', $pemasok->id) }}"
                                        class="btn btn-sm btn-secondary">Show</a>
                                    <a href="{{ route('admin.masterpemasok.edit', $pemasok->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $pemasok->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $pemasok->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $pemasok->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $pemasok->id }}">Hapus
                                                        Pemasok</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data "{{ $pemasok->nama_pemasok }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.masterpemasok.destroy', $pemasok->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection