<?php

namespace App\Model;
use App\Model\Product;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
		'name','detail', 'user_id',
	];
    public function Product()
    {
    	return $this->hasMany(Product::class); 
    }
}
