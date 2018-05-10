<?php

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\Resource;

class CategoriesCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'href' => [
                'reviews' => route('categories.show',$this->id)
            ]
        ];
    }
}
