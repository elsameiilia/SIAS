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
                'nama' => 'Guru Pengajar',
                'nip' => '1001',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Guru Pengajar',
                'nip' => '1002',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Guru Pengajar',
                'nip' => '1003',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Guru Pengajar',
                'nip' => '1004',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Guru Pengajar',
                'nip' => '1005',
                'role' => 'guru_pengajar',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Guru BK',
                'nip' => '2001',
                'role' => 'guru_bk',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Wakasek Kesiswaan',
                'nip' => '3001',
                'role' => 'wakasek_kesiswaan',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Wakasek Kurikulum',
                'nip' => '4001',
                'role' => 'wakasek_kurikulum',
                'password' => Hash::make('password')
            ],
            [
                'nama' => 'Admin IT',
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
