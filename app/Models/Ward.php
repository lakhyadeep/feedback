<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ward extends Model
{

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }
}
