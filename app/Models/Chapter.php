<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
