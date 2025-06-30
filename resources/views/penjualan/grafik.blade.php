@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Grafik Penjualan</h2>
    <canvas id="penjualanChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($data->pluck('tanggal')) !!};
    const data = {!! json_encode($data->pluck('total')) !!};

    const ctx = document.getElementById('penjualanChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan per Hari',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.3,
                fill: false
            }]
        }
    });
</script>
@endsection
