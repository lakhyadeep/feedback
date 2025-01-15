<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedbacks";

    protected $casts = [
        'most_critical_issues' => 'array',
        'attach_file' => 'array'
    ];

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class)->orderBy('id', 'asc');
    }

    public static function calculatePercentage($column, $value, $ward, $dateRange)
    {
        $query = self::query();
        $query->where('ward_id', $ward);
        $query->whereBetween('created_at', [$dateRange['start'], $dateRange['end']]);

        $totalCount = $query->count();

        if ($totalCount > 0) {
            $valueCount = $query->where($column, $value)->count();
            $percentage = ($valueCount / $totalCount) * 100;
            return round($percentage, 2);
        }

        return 0;
    }

    public static function calcutateParameterAverageWardWise($param)
    {
        $average = self::select('ward_id', DB::raw("ROUND(AVG($param),1) as average"))
            ->groupBy('ward_id')
            ->get()->toArray();
        return $average;
    }


    public static function calculatePercentageWardWise($column)
    {
        $data = self::select(
            'ward_id',
            DB::raw("ROUND(SUM($column = 1) * 100 / COUNT(*),2) AS yesPercentage"),
            DB::raw("ROUND(SUM($column = 0) * 100 / COUNT(*),2) AS noPercentage"),
        )
            ->groupBy('ward_id')->get()->toArray();

        return $data;
    }


    public static function setColorBasedOnRating($isFive = false, $value)
    {
        if ($isFive) {
            if ($value > 2.5)
                return 'green';
            if ($value >= 2 && $value <= 2.5)
                return 'orange';
            if ($value < 2)
                return 'red';
        } else {
            if ($value > 2)
                return 'green';
            if ($value == 2)
                return 'orange';
            if ($value < 2)
                return 'red';
        }
    }
}
