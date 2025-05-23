<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $gurus = User::all();
        $kelases = Kelas::all();
        $mapels = Mapel::all();
        foreach ($hariList as $hari) {
            foreach ($kelases as $kelas) {
                $jamMulai = Carbon::createFromTime(0, 0, 0); // mulai dari jam 07:00

                // Misalnya 4 pelajaran per hari per kelas
                for ($i = 0; $i < 6; $i++) {
                    $guru = $gurus->random();
                    $mapel = $mapels->random();

                    $jamSelesai = (clone $jamMulai)->addHour(4);

                    Jadwal::create([
                        'hari' => $hari,
                        'guru_id' => $guru->id,
                        'kelas_id' => $kelas->kelas_id,
                        'mapel_id' => $mapel->mapel_id,
                        'jam_mulai' => $jamMulai->format('H:i:s'),
                        'jam_selesai' => $jamSelesai->format('H:i:s'),
                    ]);

                    $jamMulai = $jamSelesai; // geser ke jam berikutnya
                }
            }
        }
    }
}
