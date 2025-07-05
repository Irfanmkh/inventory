<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\MasterProduk;
use Illuminate\Http\Request;
use App\Models\MasterPemasok;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MasterProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $masterproduk = MasterProduk::with('pembelian')->get();
        return view('masterproduk.index', compact('masterproduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemasoks = MasterPemasok::all();
        $pembelians = Pembelian::select('id', 'nama_produk', 'harga_satuan', 'jumlah_pesanan')->get();


        return view('masterproduk.create', compact('pemasoks', 'pembelians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembelian = Pembelian::find($request->pembelian_id);
    
        $request->validate(
            [
                'pembelian_id' => 'required|exists:pembelian,id',
                'jenis' => 'required|max:45',
                'harga_jual' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'jumlah' => [
                    'required',
                    'numeric',
                    function ($attribute, $value, $fail) use ($pembelian) {
                        if ($pembelian && $value > $pembelian->jumlah_pesanan) {
                            $fail('Jumlah tidak boleh melebihi stok pembelian: ' . $pembelian->jumlah_pesanan);
                        }
                    }
                ],
                'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'pembelian_id.required' => 'Produk wajib dipilih',
                'pembelian_id.exists' => 'Produk tidak valid',
                'jenis.required' => 'Jenis wajib diisi',
                'jenis.max' => 'Jenis maksimal 45 karakter',
                'foto.max' => 'Foto maksimal 2 MB',
                'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
                'foto.image' => 'File harus berbentuk image'
            ]
        );
    
        if (!empty($request->foto)) {
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }
    
        DB::table('master_produks')->insert([
            'nama' => $pembelian ? $pembelian->nama_produk : '-',
            'jenis' => $request->jenis,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
            'pembelian_id' => $request->pembelian_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('admin.masterproduk.index')
            ->with('success', 'Data berhasil disimpan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(MasterProduk $id)
    {
        //
        return view('masterproduk.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterProduk $id)
    {
        //
        $pembelians = Pembelian::select('id', 'nama_produk', 'harga_satuan', 'jumlah_pesanan')->get();
        return view('masterproduk.edit', compact('id', 'pembelians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $pembelians = Pembelian::find($request->pembelian_id);

        //dd($request);
        $request->validate(
            [
                'pembelian_id' => 'required|exists:pembelian,id',
                'jenis' => 'required|max:45',
                'harga_jual' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'jumlah' => 'required|numeric',
                'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ],
            [
                'pembelian_id.required' => 'Produk wajib dipilih',
                'jenis.required' => 'jenis wajib diisi',
                'jenis.max' => 'jenis maksimal 45 karakter',
                'foto.max' => 'Foto maksimal 2 MB',
                'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
                'foto.image' => 'File harus berbentuk image'
            ]
        );


        //foto lama
        // $fotoLama = DB::table('master_produks')->select('foto')->where('id', $id)->get();
        // foreach ($fotoLama as $f1) {
        //     $fotoLama = $f1->foto;
        // }

        $fotoLama = DB::table('master_produks')->where('id', $id)->value('foto');

        //jika foto sudah ada yang terupload
        if (!empty($request->foto)) {
            //maka proses selanjutnya
            if (!empty($fotoLama->foto)) unlink(public_path('image' . $fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-' . $request->id . '.' . $request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = $fotoLama;
        }

        //update data produk
        DB::table('master_produks')->where('id', $id)->update([
            'nama' => $pembelians ? $pembelians->nama_produk : '-',
            'jenis' => $request->jenis,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
        ]);

        return redirect()->route('admin.masterproduk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterProduk $id)
    {
        //
        $id->delete();

        return redirect()->route('admin.masterproduk.index')
            ->with('success', 'Data berhasil di hapus');
    }
}
