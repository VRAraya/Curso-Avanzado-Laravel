<?php

namespace App\Models;

use App\Models\Utils\CanBeRate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use CanBeRate;

    protected $guarded = [];

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
