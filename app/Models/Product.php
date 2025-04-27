<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['country_id', 'category_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'price_ceiling', 'effective_date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    public function mandatoryRequests()
    {
        return $this->hasMany(MandatoryRequest::class);
    }

}

