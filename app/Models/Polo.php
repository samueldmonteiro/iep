<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'image', 'contact', 'slug', 'acronym'
    ];
}
