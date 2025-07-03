<?php

namespace App\Http\Controllers;

use App\Models\MasterProduk;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $lariss = Penjualan::selectRaw('produk_id, SUM(jumlah_terjual) as total_terjual')
        ->with('produk')
        ->groupBy('produk_id')
        ->orderByDesc('total_terjual')
        ->get();

        $larisLabels = $lariss->map(fn($p) => $p->produk->nama ?? 'Unknown')->toArray();
        $larisData = $lariss->map(fn($p) => $p->total_terjual)->toArray();

// =======================================================
        $totals = MasterProduk::selectRaw('jenis, COUNT(*) as total')
        ->groupBy('jenis')
        ->get();

        $totalLabels = $totals->pluck('jenis')->toArray();
        $totalData = $totals->pluck('total')->toArray();

       

        return view('admin.dashboard', compact('lariss', 'larisLabels', 'larisData', 'totals', 'totalLabels', 'totalData'));
    }


}
