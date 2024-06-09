<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';

    protected $fillable = [
        'id_kelas',
        'id_murid',
        'nilai',
    ];

    public static $rules = [
        'id_kelas' => 'required|exists:kelas,id',
        'id_murid' => 'required|exists:murids,id',
        'nilai' => 'required|integer',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }
}
