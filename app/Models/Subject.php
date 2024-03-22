<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
