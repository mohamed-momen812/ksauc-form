<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['sector_id', 'name_en', 'name_ar'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function mandatoryRequests()
    {
        return $this->hasMany(MandatoryRequest::class);
    }
}

