<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murids';

    protected $fillable = [
        'name',
        'gender',
        'tanggal_lahir',
        'phone',
        'user_id',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'gender' => 'nullable|integer',
        'tanggal_lahir' => 'nullable|date',
        'phone' => 'nullable|string|max:255',
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_murid');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
