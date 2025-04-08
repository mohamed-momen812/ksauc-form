<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['product_id','name_en', 'name_ar'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
