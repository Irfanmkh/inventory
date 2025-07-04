<?php

namespace App\Http\Controllers;

use App\Models\MasterProduk;
use App\Models\Penjualan;
use App\Models\ReturBarang;
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

       // =======================================================

       $returs = ReturBarang::selectRaw('produk_id, SUM(jumlah) as total_retur')
       ->with('produk')
       ->groupBy('produk_id')
       ->orderByDesc('total_retur')
       ->get();

       $returLabels = $returs->map(fn($p) => $p->produk->nama ?? 'Unknown')->toArray();
       $returData = $returs->map(fn($p) => $p->total_retur)->toArray();


        return view('admin.dashboard', compact('lariss', 'larisLabels', 'larisData', 'totals', 'totalLabels', 'totalData', 'returs', 'returLabels', 'returData'));
    }


}
