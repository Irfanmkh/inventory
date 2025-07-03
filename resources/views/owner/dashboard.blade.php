@extends('layouts.owner') {{-- Ini menggunakan file layoutmu --}}

@section('title', 'Dashboard Owner')

@section('content')
    <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
    <p>Ini adalah halaman dashboard Owner.</p>

    <h2>5 Produk Terlaris</h2>
    <canvas id="produkChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('produkChart').getContext('2d');
        const produkChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: {!! json_encode($data) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection