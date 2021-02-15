<?php

namespace App\Models\Utils;

trait CanRate
{
    public function ratings($model = null)
    {
        /**
         * Is a relationship that receives a model that can be null
         * 
         * Model Class can be the model class 
         * 
         */
        
        $modelClass = $model ? $model : $this->getMorphClass();

        $morphToMany = $this->morphToMany(
            $modelClass,
            'qualifier',
            'ratings',
            'qualifier_id',
            'rateable_id'
        );

        $morphToMany
            ->as('rating')
            ->withTimestamps()
            ->withPivot('score', 'rateable_type')
            ->wherePivot('rateable_type', get_class($model))
            ->wherePivot('qualifier_type', $this->getMorphClass());
    }
}