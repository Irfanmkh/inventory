@extends('layouts.owner') {{-- Ini menggunakan file layoutmu --}}

@section('title', 'Dashboard Owner')

@section('content')
    <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
    <p>Ini adalah halaman dashboard Owner.</p>
@endsection