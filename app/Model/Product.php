<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Reviews;
use App\Model\Category;


class Product extends Model
{
    public function reviews()
    {
    	return $this->hasMany(Reviews::class); 
    }

    public function Category()
    {
    	return $this->belongsTo(Category::class); 
    }
}
