<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Polo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'image', 'contact', 'slug', 'acronym'
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
