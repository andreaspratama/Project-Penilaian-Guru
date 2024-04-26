<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function gurus(): HasMany
    {
        return $this->hasMany(Guru::class);
    }

    public function penilais(): HasMany
    {
        return $this->hasMany(Penilai::class);
    }
}
