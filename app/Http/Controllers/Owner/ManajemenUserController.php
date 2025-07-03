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
        $penggunas = Pengguna::where('role', 'admin')->get();
        return view('manajemenakun.index', compact('penggunas'));
    }

    public function create()
    {
        return view('manajemenakun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:penggunas,email',
            'password' => 'required|min:6',
        ]);

        Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('owner.manajemen-user.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penggunas = Pengguna::findOrFail($id);
        return view('manajemenakun.edit', compact('penggunas'));
    }

    public function update(Request $request, $id)
    {
        $admin = Pengguna::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:penggunas,email,' . $admin->id,
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('owner.manajemen-user.index')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = Pengguna::findOrFail($id);
        $admin->delete();

        return redirect()->route('owner.manajemen-user.index')->with('success', 'Admin berhasil dihapus.');
    }
}
