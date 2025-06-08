<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Budi',
                'nip' => '1001',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Dedi',
                'nip' => '1002',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Agus',
                'nip' => '1003',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Hendra',
                'nip' => '1004',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                    'nama' => 'Siti',
                'nip' => '1005',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Rina',
                'nip' => '2001',
                'role' => 'guru_bk',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Joko',
                'nip' => '3001',
                'role' => 'wakasek_kesiswaan',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Bambang',
                'nip' => '4001',
                'role' => 'wakasek_kurikulum',
                'password' => Hash::make('password')
            ],
            [
              'nama' => 'Jajang',
              'nip'=>'5001',
              'role' => 'kepala_sekolah',
              'password' => Hash::make('password')
            ],
            [
                'nama' => 'Arya',
                'nip' => 'admin123',
                'role' => 'admin',
                'password' => Hash::make('admin123')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
