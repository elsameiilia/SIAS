<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\AbsensiGuru;
use Illuminate\Support\Facades\DB;

class WakasekKurikulumController extends Controller
{
    public function dashboard()
    {
        return view('wakasek_kurikulum.dashboard');
    }

    public function absenGuruForm()
    {
        $guru = User::all();
        return view('wakasek_kurikulum.absensi_guru', compact('guru'));
    }

    public function simpanAbsenGuru(Request $request)
    {
        $tanggal = Carbon::today()->toDateString();

        foreach ($request->guru_id as $index => $id) {
            AbsensiGuru::updateOrCreate(
                ['guru_id' => $id, 'tanggal' => $tanggal],
                [
                    'status' => $request->status[$index],
                    'keterangan' => $request->keterangan[$index] ?? null,
                    'bukti' => isset($request->bukti[$index]) ? $request->bukti[$index]->store('bukti_guru', 'public') : null,
                ]
            );
        }

        return redirect()->route('wakasek.dashboard')->with('success', 'Absensi guru berhasil disimpan.');
    }

    public function monitoringGuru(Request $request)
    {
        // Ambil tanggal dari request atau default hari ini
        $tanggal = $request->input('tanggal', Carbon::today()->format('Y-m-d'));

        // Ambil semua guru (dengan role guru_pengajar), lalu left join dengan absensi_guru
        $data = DB::table('users')
            ->leftJoin('absensi_guru', function($join) use ($tanggal) {
                $join->on('users.id', '=', 'absensi_guru.guru_id')
                    ->whereDate('absensi_guru.tanggal', '=', $tanggal);
            })
            ->select(
                'users.nama as nama_guru',
                'absensi_guru.status',
                'absensi_guru.keterangan',
                'absensi_guru.bukti'
            )
            ->get();

        return view('wakasek_kurikulum.monitoring_guru', compact('data', 'tanggal'));
    }
}
