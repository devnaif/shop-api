<?php

namespace App\Model;
use App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Product()
    {
    	return $this->hasMany(Product::class); 
    }
}
