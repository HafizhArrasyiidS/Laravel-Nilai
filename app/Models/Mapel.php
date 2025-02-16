<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class);
    }

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }
}
