<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Registration extends Model
{
    use HasFactory;


    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }


    public function polo(): BelongsTo
    {
        return $this->belongsTo(Polo::class);
    }

    public function statusPayment()
    {
        return $this->payment == 'approved' ? "Pago" : "Não Pago";
    }
}
