<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function pengajars()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id');
    }

    public function siswas()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
