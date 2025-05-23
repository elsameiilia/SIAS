<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bolos extends Model
{
    protected $table = 'bolos';
    protected $primaryKey = 'bolos_id';

    protected $fillable = ['keterangan', 'siswa_id', 'jadwal_id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'siswa_id');
    }
    public function jadwal()
    {
        return $this->belongsTo(\App\Models\Jadwal::class, 'jadwal_id');
    }
}
