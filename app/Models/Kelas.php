<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'id_guru',
        'id_mata_pelajaran',
    ];

    public static $rules = [
        'id_guru' => 'required|exists:gurus,id',
        'id_mata_pelajaran' => 'required|exists:mata_pelajarans,id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_kelas');
    }
}
