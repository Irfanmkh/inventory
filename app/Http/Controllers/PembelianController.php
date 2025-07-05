<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\MasterProduk;
use App\Models\MasterPemasok;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pembelian = Pembelian::with(['produk', 'pemasok'])->get();
        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $produk = MasterProduk::all();
        $pemasoks = MasterPemasok::all();
        return view('pembelian.create', compact('pemasoks'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            // 'masterproduk' => 'required|exists:produk,id',
            'jumlah' => 'required|integer',
            // 'masterpemasok' => 'required|exists:pemasok,id',
        ]);

        Pembelian::create([
            // 'produk_id' => $request->produk_id,
            'nama_produk' => $request->produk,
            'jumlah_pesanan' => $request->jumlah,
            'jumlah_diterima' => 0,
            // 'pemasok_id' => $request->pemasok_id,
            'pemasok_id' => $request->pemasok_id,
            'status' => 'Tertunda',
            'riwayat_pesanan' => 'Belum diproses',
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'total_harga' => $request->total_harga,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('admin.pembelian.index')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pembelian = Pembelian::with(['produk', 'pemasok'])->findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pembelian = Pembelian::findOrFail($id);
        $pemasoks = MasterPemasok::all();
        $produks = MasterProduk::all();

        return view('pembelian.edit', compact('pembelian', 'pemasoks', 'produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'harga_satuan' => 'required|numeric|min:0',
            'jumlah_pesanan' => 'required|integer|min:1',
        ]);


        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->only('tanggal_pembelian', 'pemasok_id', 'nama_produk', 'jumlah_pesanan', 'harga_satuan', 'total_harga', 'status'));

        return redirect()->route('admin.pembelian.index')->with('success', 'Data pembelian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('admin.pembelian.index')->with('success', 'Data pembelian berhasil dihapus.');
    }
}
