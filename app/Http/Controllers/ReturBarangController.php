<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturBarang;
use App\Models\MasterProduk;
use Symfony\Contracts\Service\Attribute\Required;

class ReturBarangController extends Controller
{
    // Menampilkan semua data retur barang
    public function index()
    {
        $returBarangs = ReturBarang::with('produk')->latest()->get();
        return view('retur.index', compact('returBarangs'));
    }

    // Menampilkan form tambah retur barang
    public function create()
    {
        $produks = MasterProduk::all();
        return view('retur.create', compact('produks'));
    }

    // Menyimpan data retur barang
    public function store(Request $request)
    {
        $request->validate([
            // 'produk_id' => 'required|exists:produks,id',
            // 'jumlah' => 'required|integer|min:1',
            // 'alasan' => 'nullable|string',
            'tanggal_retur' => 'required|date',
        ]);

        ReturBarang::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'tanggal_retur' => $request->tanggal_retur,
        ]);

        return redirect()->route('retur.index')->with('success', 'Data retur barang berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $retur = ReturBarang::findOrFail($id);
        $produks = MasterProduk::all();
        return view('retur.edit', compact('retur', 'produks'));
    }

    // Menyimpan hasil edit
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'produk_id' => 'required|exists:produks,id',
            // 'jumlah' => 'required|integer|min:1',
            // 'alasan' => 'nullable|string',
            'tanggal_retur' => 'required|date',
        ]);

        $retur = ReturBarang::findOrFail($id);
        $retur->update([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'tanggal_retur' => $request->tanggal_retur,
        ]);

        return redirect()->route('retur.index')->with('success', 'Data retur barang berhasil diperbarui.');
    }

    // Menghapus retur barang
    public function destroy($id)
    {
        $retur = ReturBarang::findOrFail($id);
        $retur->delete();

        return redirect()->route('retur.index')->with('success', 'Data retur barang berhasil dihapus.');
    }
}
