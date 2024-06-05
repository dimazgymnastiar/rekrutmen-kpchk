<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Interview extends Model
{
    use HasFactory, HasUuids;
 
    protected $fillable = [
        'foto',
        'lowongan_id',
        'nama',
        'jenisKelamin',
        'tglLahir',
        'pend',
        'cerita',
        'cv'
    ];
    public function lowongan() {
        return $this->belongsTo(Lowongan::class,'lowongan_id');
    }
}