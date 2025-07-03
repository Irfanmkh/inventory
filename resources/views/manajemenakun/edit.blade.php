@extends('layouts.owner')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Manajemen User / Edit</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-edit me-1"></i>
            Form Edit Admin
        </div>
        <div class="card-body">
            <form action="{{ route('owner.manajemen-user.update', $penggunas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-2">
                    <label for="name">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $penggunas->name }}">
                </div>

                <div class="form-group mb-2">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $penggunas->email }}">
                </div>

                <div class="form-group mb-2">
                    <label for="password">Kata Sandi Baru (opsional):</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection