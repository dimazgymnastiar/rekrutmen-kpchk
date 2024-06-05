<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lowongan_id',
        'nama',
        'tglLahir',
        'jenisKelamin',
        'pend',
        'cerita',
        'foto',
        'cv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
