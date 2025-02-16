<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function mapels()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
