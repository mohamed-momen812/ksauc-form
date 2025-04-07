<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name_en', 'name_ar'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
