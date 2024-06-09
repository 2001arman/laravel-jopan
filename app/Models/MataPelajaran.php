<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    protected $fillable = [
        'name',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_mata_pelajaran');
    }
}
