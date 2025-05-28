<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiGuru extends Model
{
    use HasFactory;

    protected $table = 'absensi_guru';
    protected $primaryKey = 'absensi_guru_id';
    protected $fillable = ['guru_id', 'status', 'keterangan', 'bukti', 'tanggal'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}
