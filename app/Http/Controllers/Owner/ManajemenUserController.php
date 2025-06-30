<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{
    public function index()
    {
        $admins = Pengguna::where('role', 'admin')->get();
        return view('owner.manajemen_user.index', compact('admins'));
    }

    public function create()
    {
        return view('owner.manajemen_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:6',
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('owner.user.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = Pengguna::findOrFail($id);
        return view('owner.manajemen_user.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Pengguna::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:penggunas,email,' . $admin->id,
        ]);

        $admin->nama = $request->nama;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('owner.user.index')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = Pengguna::findOrFail($id);
        $admin->delete();

        return redirect()->route('owner.user.index')->with('success', 'Admin berhasil dihapus.');
    }
}
