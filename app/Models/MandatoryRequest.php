<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MandatoryRequest extends Model
{
    protected $fillable = [
        'user_id',
        'factory_country',
        'factory_name',
        'baseline-ratio',
        'item_type',
        'nupco_code',
        'nupco_description',
        'sector_id',
        'group_id',
        'category_id',
        'product_id',
        'email',
        'website',
        'phone',
        'region',
        'address',
        'commercial_registration_number',
        'registered_name',
        'industrial_license_number',
        'has_local_content_certificate',
        'local_content_percentage',
        'industrial_license',
        'local_content_certificate',
        'sfda_certificate',
        'other_certificate',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
