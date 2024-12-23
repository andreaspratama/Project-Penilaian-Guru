<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ds extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(Guru::class);
    }
}
