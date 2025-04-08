<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatoryProduct extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = [
        'sector',
        'segment_no',
        'segment_title_ar',
        'segment_title_en',
        'etimad_code',
        'commodity_title_ar',
        'commodity_title_en',
        'commodity_definition_ar',
        'commodity_definition_en',
        'group_code',
        'group_name',
        'section_code',
        'section_name_ar',
        'section_name_en',
        'class_code',
        'class_name',
        'chapter_code',
        'chapter_name',
        'item_code',
        'item_name_en',
        'item_name_ar',
        'technical_description_ar',
        'technical_description_en',
        'price_ceiling',
        'effective_date',
        'manufacturer_local_content',
        'notes'
    ];
}