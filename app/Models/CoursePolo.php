<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePolo extends Model
{
    use HasFactory;

    protected $table = "course_polo";

    protected $fillable = [
        'course_id',
        'polo_id',
        'registration_price',
        'workload',
        'available',
    ];
}

