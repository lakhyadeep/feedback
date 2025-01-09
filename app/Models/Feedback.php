<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{

    use HasFactory;

    const FIVE_VALUE = 5;
    const FOUR_VALUE = 4;
    const THREE_VALUE = 3;
    const TWO_VALUE = 2;
    const ONE_VALUE = 1;
    const ZERO_VALUE = 0;

    protected $table = "feedbacks";

    protected $casts = [
        'most_critical_issues' => 'array',
        'attach_file' => 'array'
    ];

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class)->orderBy('id', 'asc');
    }

    public static function calculatePercentage($column, $value, $ward = null, $dateRange = null)
    {
        $query = self::query();
        if ($ward) {
            $query->where('ward_id', $ward);
        }
        if ($dateRange && isset($dateRange['start']) && isset($dateRange['end'])) {
            $query->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);
        }


        $totalCount = $query->count();

        if ($totalCount > 0) {
            $valueCount = $query->where($column, $value)->count();
            return ($valueCount / $totalCount) * 100;
        }

        return 0;
    }
}
