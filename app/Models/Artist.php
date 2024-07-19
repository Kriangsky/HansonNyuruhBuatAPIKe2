<?php

namespace App\Models;

use App\Models\Music;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Age',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Music::class, 'artistId');
    }
}
