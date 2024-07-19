<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Music extends Model
{
    use HasFactory;
    protected $fillable = [
        'Title',
        'Image',
        'Link',
        'artistId',
        'categoryId',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artistId');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
