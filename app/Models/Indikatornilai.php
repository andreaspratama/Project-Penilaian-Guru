<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikatornilai extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gurus(): BelongsToMany
    {
        return $this->belongsToMany(Guru::class);
    }
}
