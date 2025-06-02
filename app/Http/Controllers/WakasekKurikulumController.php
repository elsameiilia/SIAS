<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\AbsensiGuru;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

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
    public function rekap(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $search = $request->search;

        $query = User::all()->orderBy('nama');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $guruPaginated = $query->paginate(10)->withQueryString(); // <== pagination

        $data = [];

        foreach ($guruPaginated as $g) {
            $hadir = AbsensiGuru::where('id', $g->id)
                ->where('status', 'hadir')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $sakit = AbsensiGuru::where('id', $g->id)
                ->where('status', 'sakit')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $izin = AbsensiGuru::where('id', $g->id)
                ->where('status', 'izin')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $alpha = AbsensiGuru::where('id', $g->id)
                ->where('status', 'alpha')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $data[] = [
                'guru' => $g,
                'hadir' => $hadir,
                'sakit' => $sakit,
                'izin' => $izin,
                'alpha' => $alpha,
            ];
        }

        return view('bk.rekap.index', [
            'guruPaginated' => $guruPaginated,
            'data' => $data,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'search' => $search
        ]);
    }

    public function downloadRekap(Request $request){
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $search = $request->search;

        $query = User::all()->orderBy('nama');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $guruList = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'NIS');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Kelas');
        $sheet->setCellValue('D1', 'Hadir');
        $sheet->setCellValue('E1', 'Sakit');
        $sheet->setCellValue('F1', 'Izin');
        $sheet->setCellValue('G1', 'Alpha');
        $sheet->setCellValue('H1', 'Bolos');

        $row = 2;

        foreach ($guruList as $g) {
            $hadir = AbsensiGuru::where('id', $g->id)
                ->where('status', 'hadir')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $sakit = AbsensiGuru::where('id', $g->id)
                ->where('status', 'sakit')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $izin = AbsensiGuru::where('id', $g->id)
                ->where('status', 'izin')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $alpha = AbsensiGuru::where('id', $g->id)
                ->where('status', 'alpha')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->count();

            $sheet->setCellValue('A' . $row, $g->nis);
            $sheet->setCellValue('B' . $row, $g->nama);    
            $sheet->setCellValue('C' . $row, $hadir);
            $sheet->setCellValue('D' . $row, $sakit);
            $sheet->setCellValue('E' . $row, $izin);
            $sheet->setCellValue('F' . $row, $alpha);

            $row++;
        }

        $filename = "Rekap_Absensi_Guru_{$bulan}_{$tahun}.xlsx";
        $writer = new Xlsx($spreadsheet);

        // Simpan ke output
        $tempFile = tempnam(sys_get_temp_dir(), 'rekap');
        $writer->save($tempFile);

        return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
    }
}
