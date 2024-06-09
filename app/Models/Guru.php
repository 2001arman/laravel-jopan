<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'name',
        'gender',
        'tanggal_lahir',
        'phone',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'gender' => 'nullable|integer',
        'tanggal_lahir' => 'nullable|date',
        'phone' => 'nullable|string|max:255',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_guru');
    }
}
