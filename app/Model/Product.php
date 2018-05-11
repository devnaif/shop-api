<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Reviews;
use App\Model\Category;


class Product extends Model
{
    protected $fillable = [
		'name','detail','stock','price','discount','category_id','user_id',
	];
    public function reviews()
    {
    	return $this->hasMany(Reviews::class); 
    }

    public function Category()
    {
    	return $this->belongsTo(Category::class); 
    }
}
