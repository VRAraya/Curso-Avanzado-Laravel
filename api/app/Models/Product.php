<?php

namespace App\Models;

use App\Models\Utils\CanBeRate;
use App\Events\ProductCreating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use CanBeRate;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'creating' => ProductCreating::class
    ];

    // A product belongs to one category
    public function category()
    {    
        return $this->belongsTo(Category::class);
    }

    // A product has been created by a unique user
    public function createdBy()
    {    
        return $this->belongsTo(User::class, 'created_by');
    }

}
