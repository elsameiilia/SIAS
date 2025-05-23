<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'jadwal_id';
    protected $fillable = [
        'hari',
        'guru_id',
        'kelas_id',
        'mapel_id',
        'jam_mulai',
        'jam_selesai',
        'hari',
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id', 'id'); // asumsi guru disimpan di users
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'mapel_id');
    }
}
