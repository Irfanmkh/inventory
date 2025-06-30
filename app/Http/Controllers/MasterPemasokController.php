<?php

namespace App\Http\Controllers;

use App\Models\MasterPemasok;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMasterPemasokRequest;
use App\Http\Requests\UpdateMasterPemasokRequest;
use Illuminate\Support\Facades\DB;

class MasterPemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masterpemasok = MasterPemasok::all();
        return view('admin.masterpemasok.index', compact('masterpemasok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterpemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);


        $request->validate(
            [
                'nama_pemasok' => 'required|max:100',
                'lokasi_pemasok' => 'required|max:100',
                'kontak' => 'required|max:50',
                'produk' => 'nullable|max:100',
            ],
            [
                'nama_pemasok.required' => 'Nama pemasok wajib diisi',
                'nama_pemasok.max' => 'Nama pemasok maksimal 100 karakter',
                'lokasi_pemasok.required' => 'Lokasi wajib diisi',
                'lokasi_pemasok.max' => 'Lokasi maksimal 100 karakter',
                'kontak.required' => 'Kontak wajib diisi',
                'kontak.max' => 'Kontak maksimal 50 karakter',
                'produk.max' => 'Produk maksimal 100 karakter',
            ]
        );

        // Simpan ke database
        // DB::table('master_pemasoks')->insert([
        //     'nama_pemasok' => $request->nama_pemasok,
        //     'lokasi_pemasok' => $request->lokasi_pemasok,
        //     'kontak' => $request->kontak,
        //     'produk' => $request->produk,
        // ]);
        MasterPemasok::create([
            'nama_pemasok'     => $request->nama_pemasok,
            'lokasi_pemasok' => $request->lokasi_pemasok,
            'kontak' => $request->kontak,
            'produk' => $request->produk,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.masterpemasok.index')->with('success', 'Data pemasok berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $masterpemasok = MasterPemasok::findOrFail($id);
        return view('admin.masterpemasok.show', compact('masterpemasok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $masterpemasok = MasterPemasok::findOrFail($id);
        return view('admin.masterpemasok.edit', compact('masterpemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_pemasok' => 'required|max:100',
            'lokasi_pemasok' => 'required|max:100',
            'kontak' => 'required|max:50',
            'produk' => 'nullable|max:100',
        ], [
            'nama_pemasok.required' => 'Nama pemasok wajib diisi.',
            'lokasi_pemasok.required' => 'Lokasi wajib diisi.',
            'kontak.required' => 'Kontak wajib diisi.',
        ]);

        // Temukan data pemasok berdasarkan ID
        $pemasok = MasterPemasok::findOrFail($id);

        // Update data
        $pemasok->update($request->only('nama_pemasok', 'lokasi_pemasok', 'kontak', 'produk'));

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('admin.masterpemasok.index')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $masterpemasok = MasterPemasok::findOrFail($id);
        $masterpemasok->delete();

        return redirect()->route('admin.masterpemasok.index')
            ->with('success', 'Data pemasok berhasil dihapus.');
    }
}
