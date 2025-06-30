@extends('layouts.main') {{-- Ini menggunakan file layoutmu --}}

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
    <p>Ini adalah halaman dashboard admin.</p>
@endsection