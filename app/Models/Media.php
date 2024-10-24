<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    protected $fillable = [
        'media_id',
        'media_type',
        'title',
        'overview',
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
