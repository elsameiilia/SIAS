<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = [
            [
                'kelas' => '7',
                'sub_kelas' => '1',
            ],
            [
                'kelas' => '7',
                'sub_kelas' => '2',
            ],
            [
                'kelas' => '7',
                'sub_kelas' => '3',
            ],
            [
                'kelas' => '8',
                'sub_kelas' => '1',
            ],
            [
                'kelas' => '8',
                'sub_kelas' => '2',
            ],
            [
                'kelas' => '8',
                'sub_kelas' => '3',
            ],
            [
                'kelas' => '9',
                'sub_kelas' => '1',
            ],
            [
                'kelas' => '9',
                'sub_kelas' => '2',
            ],
            [
                'kelas' => '9',
                'sub_kelas' => '3',
            ],
        ];

        foreach ($kelas as $k) {
            Kelas::create($k);
        }
    }
}
