<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Bolos;

class BkDashboardController extends Controller
{
    public function index()
    {
        $tingkatKelas = Kelas::select('kelas')->distinct()->get();
        return view('bk.dashboard', compact('tingkatKelas'));
    }
    public function bolos(Request $request){
        $tanggal = $request->input('tanggal', now()->toDateString());

        $bolos = Bolos::with(['siswa.kelas', 'jadwal.mapel'])
            ->whereDate('created_at', $tanggal)
            ->get();

        return view('bk.bolos.index', compact('bolos', 'tanggal'));
    }
}
