<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'siswa_id';

    protected $fillable = ['nama', 'nis', 'kelas_id'];
    protected $timestamp = false;
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }
    public function absensiSiswa()
    {
        return $this->hasMany(AbsensiSiswa::class, 'siswa_id', 'siswa_id');
    }
}
