<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelasList = Kelas::all();
        $nama = [
            'Aaaa',
            'Bbbb',
            'Cccc',
            'Dddd',
        ];

        foreach ($kelasList as $kelas) {
            for ($i = 0; $i < count($nama); $i++) {
                Siswa::create([
                    'nama' => $nama[$i],
                    'nis' => "{$kelas->kelas_id}00{$i}",
                    'kelas_id' => $kelas->kelas_id,
                ]);
            }
        }
    }
}
