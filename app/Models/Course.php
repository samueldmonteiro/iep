<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Polo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'mini_description',
        'image',
        'slug',
    ];

    public function polos(): BelongsToMany
    {
        return $this->belongsToMany(Polo::class);
    }
}
