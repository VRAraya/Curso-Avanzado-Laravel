<?php

namespace App\Models\Utils;

use Illuminate\Database\Eloquent\Model;

trait CanBeRate
{
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