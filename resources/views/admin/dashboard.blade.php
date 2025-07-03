@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Selamat datang, {{ Auth::user()->name }}!</h1>

        <h2 class="mb-3">Statistik Penjualan</h2>

        {{-- Tabs --}}
        <ul class="nav nav-tabs" id="grafikTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="terlaris-tab" data-bs-toggle="tab" data-bs-target="#terlaris"
                    type="button" role="tab">Produk Terlaris</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kategori-tab" data-bs-toggle="tab" data-bs-target="#total" type="button"
                    role="tab">Kategori Produk</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pendapatan-tab" data-bs-toggle="tab" data-bs-target="#pendapatan"
                    type="button" role="tab">Pendapatan Bulanan</button>
            </li>
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content mt-4" id="grafikTabsContent">
            <div class="tab-pane fade show active" id="terlaris" role="tabpanel">
                <div class="card p-3">
                    <h5 class="mb-3">Grafik Produk Terlaris</h5>
                    <div style="position: relative; height: 250px;">
                        <canvas id="larisChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="total" role="tabpanel">
                <div class="card p-3">
                    <h5 class="mb-3">Grafik Total Produk</h5>
                    <div style="position: relative; height: 250px;">
                        <canvas id="totalChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pendapatan" role="tabpanel">
                <div class="card p-3">
                    <h5 class="mb-3">Grafik Pendapatan Bulanan</h5>
                    <div style="position: relative; height: 250px;">
                        <canvas id="pendapatanChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Script grafik --}}
    <script>
        // Grafik Produk Terlaris
        const produkChart = new Chart(document.getElementById('larisChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($larisLabels) !!},
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: {!! json_encode($larisData) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

        // Dummy data grafik kategori
        const kategoriChart = new Chart(document.getElementById('totalChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($totalLabels) !!},
                datasets: [{
                    label: 'Total Produk',
                    data: {!! json_encode($totalData) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                        
                        
                    
                    
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

        // Dummy data grafik pendapatan
        const pendapatanChart = new Chart(document.getElementById('pendapatanChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [5000000, 7000000, 6000000, 8000000, 7500000, 9000000],
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.3)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
