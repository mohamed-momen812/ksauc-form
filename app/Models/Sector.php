<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name_en', 'name_ar'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
