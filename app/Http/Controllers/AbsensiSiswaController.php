<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\AbsensiSiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiSiswaController extends Controller
{
    public function kelasList()
    {
        $kelasGroup = Kelas::select('kelas')->distinct()->get();
        return view('bk.kelas.index', compact('kelasGroup'));
    }

    public function listAbsensiByKelas($kelas_id)
    {
        $tanggal = Carbon::today()->toDateString();
        return $this->listByTanggal($kelas_id, $tanggal);
    }

    public function listByTanggal($kelas_id, $tanggal=null)
    {
        $tanggal = $tanggal ?? now()->toDateString();
        $kelas = Kelas::findOrFail($kelas_id);
        $siswa = $kelas->siswa()->with(['absensiSiswa' => function($q) use ($tanggal) {
            $q->whereDate('created_at', $tanggal);
        }])->get();

        return view('bk.absensi.index', compact('kelas', 'siswa', 'tanggal'));
    }

    public function edit($id)
    {
        $absensi = AbsensiSiswa::findOrFail($id);
        return view('bk.absensi.edit', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        $absensi = AbsensiSiswa::findOrFail($id);
        $absensi->update($request->only(['status', 'keterangan', 'bukti_keterangan']));
        return redirect()->back()->with('success', 'Data absensi berhasil diperbarui.');
    }

    public function listSubkelas($kelas)
    {
        $subKelasList = Kelas::where('kelas', $kelas)->get();
        return view('bk.kelas.subkelas', compact('subKelasList', 'kelas'));
    }
    public function create($siswa_id, $tanggal)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        return view('bk.absensi.create', compact('siswa', 'tanggal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:hadir,sakit,izin,alpha',
            'keterangan' => 'nullable|string',
            'bukti_keterangan' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'siswa_id' => 'required|exists:siswa,siswa_id',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('bukti_keterangan')) {
            $validated['bukti_keterangan'] = $request->file('bukti_keterangan')->store('bukti_keterangan', 'public');
        }

        AbsensiSiswa::create([
            'status' => $validated['status'],
            'keterangan' => $validated['keterangan'] ?? '',
            'bukti_keterangan' => $validated['bukti_keterangan'] ?? null,
            'siswa_id' => $validated['siswa_id'],
            'created_at' => $validated['tanggal'], // penting agar sesuai tanggal
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data absensi berhasil ditambahkan.');
    }
}
