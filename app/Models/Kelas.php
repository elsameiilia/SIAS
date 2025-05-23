<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // opsional, tapi eksplisit

    protected $primaryKey = 'kelas_id';

    protected $fillable = ['kelas','sub_kelas'];

    protected $timestamp = false;

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'kelas_id');
    }
    public function getNamaKelasAttribute()
    {
        return "{$this->kelas} {$this->sub_kelas}";
    }

    public function scopeTingkat($query, $tingkat)
    {
        return $query->where('kelas', $tingkat);
    }
}
