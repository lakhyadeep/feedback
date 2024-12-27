<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{

    use HasFactory;


    protected $table = "feedbacks";


    protected $casts = [
        'most_critical_issues' => 'json',
    ];


    // protected function mostCriticalIssues(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => json_decode($value, true),
    //         set: fn($value) => json_encode($value),
    //     );
    //}

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class)->orderBy('id', 'asc');
    }
}
