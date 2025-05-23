<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'mapel_id';
    protected $fillable = ['nama_mapel'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'mapel_id', 'mapel_id');
    }
}
