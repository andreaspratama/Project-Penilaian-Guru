<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function indikatornilais(): BelongsToMany
    {
        return $this->belongsToMany(Indikatornilai::class)->withPivot(['prilaku', 'tuturkata']);
    }

    public function nilaiks(): HasMany
    {
        return $this->hasMany(Nilaiks::class);
    }

    public function nilaiwakakur(): HasMany
    {
        return $this->hasMany(Nilaiwakakur::class);
    }

    public function so(): HasMany
    {
        return $this->hasMany(So::class);
    }

    public function rk(): HasMany
    {
        return $this->hasMany(Rk::class);
    }

    public function ds(): HasMany
    {
        return $this->hasMany(Ds::class);
    }

    public function penilai(): BelongsToMany
    {
        return $this->belongsToMany(Penilai::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
