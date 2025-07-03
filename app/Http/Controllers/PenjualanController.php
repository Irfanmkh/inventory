<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\MasterProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('produk')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $produks = MasterProduk::all();
        return view('penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'produk_id' => 'required|exists:master_produks,id',
        //     'jumlah_terjual' => 'required|integer|min:1',
        //     'tanggal_penjualan' => 'required|date',
        // ]);
        $penjualans = Penjualan::all();

        $produk = MasterProduk::findOrFail($request->produk_id);
        $total_harga = $produk->harga_jual * $request->jumlah_terjual;

        Penjualan::create([
            'produk_id' => $request->produk_id,
            'jumlah_terjual' => $request->jumlah_terjual,
            'total_harga' => $total_harga,
            'status' => 'pending',
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        return view('penjualan.index', compact('penjualans', 'produk', 'total_harga'))->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penjualans = Penjualan::with('produk')->findOrFail($id);
        return view('penjualan.show', compact('penjualans'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $produks = MasterProduk::all();
        return view('penjualan.edit', compact('penjualan', 'produks'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'produk_id' => 'required|exists:master_produks,id',
        //     'jumlah_terjual' => 'required|integer|min:1',
        //     'tanggal_penjualan' => 'required|date',
        // ]);

        $penjualan = Penjualan::findOrFail($id);


        $penjualan->update($request->only('produk_id', 'jumlah_terjual', 'total_harga', 'status', 'tanggal_penjualan',));

        return redirect()->route('admin.penjualan.index');
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        return redirect()->route('admin.penjualan.index');
    }

    public function grafikPenjualan()
    {
        $data = Penjualan::select(
            DB::raw('DATE(tanggal_penjualan) as tanggal'),
            DB::raw('SUM(total_harga) as total')
        )
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('penjualan.grafik', compact('data'));
    }
}
