<?php

namespace App\Models\Utils;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CanBeRate
{
    public function qualifications(): HasMany
    {
        $hasMany = $this->hasMany(Rating::class, 'rateable_id');

        return $hasMany
            ->where('rateable_type', $this->getMorphClass());
    }

    public function qualifiers($model = null)
    {        
        $modelClass = $model ? (new $model)->getMorphClass() : $this->getMorphClass();

        $morphToMany = $this->morphToMany(
            $modelClass,
            'rateable',
            'ratings',
            'rateable_id',
            'qualifier_id'
        );

        $morphToMany
            ->withPivot('qualifier_type', 'score')
            ->wherePivot('qualifier_type', $modelClass)
            ->wherePivot('rateable_type', $this->getMorphClass());

        return $morphToMany;
    }

    public function averageRating(string $model = null): float
    {
        return $this->qualifiers($model)->avg('score') ?: 0.0;
    }
}