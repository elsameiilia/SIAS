<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminGuruController extends Controller
{
    public function index(Request $request)
    {
        $query = User::whereIn('role', ['guru_pengajar', 'guru_bk', 'wakasek_kesiswaan', 'wakasek_kurikulum','admin']);

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $guru = $query->paginate(10); // Atau ->get() jika tidak pakai pagination

        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
//            'nip' => 'required|nip|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(User $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, User $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|nip|unique:users,nip,' . $guru->id,
        ]);

        $guru->update([
            'nama' => $request->name,
            'nip' => $request->nip,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(User $guru)
    {
        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
