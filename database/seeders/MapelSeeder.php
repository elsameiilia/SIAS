<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mapel = ['Matematika', 'Bahasa Indonesia', 'IPA', 'IPS', 'Agama'];
        foreach ($mapel as $nama) {
            Mapel::create(['nama_mapel' => $nama]);
        }
    }
}
