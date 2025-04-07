<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['country_id', 'category_id', 'name_en', 'name_ar'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }
}
