<?php

namespace App\Imports;

use App\Models\{Sector, Group, Category, Product, ProductType};
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Row;

class MandatoryProductImport implements OnEachRow, WithStartRow, WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            // 'القائمة الالزامية' => $this, 
            // 'الاصناف غير الطبية' => $this, 
            'الاصناف الطبية' => $this,
        ];
    }
    
    public function startRow(): int
    {
        return 2; // Skip the header row
    }


    public function onRow(Row $row)
    {
        $r = $row->toArray();
        
        $sector = Sector::firstOrCreate([
            'name_ar' => $r[3],
            'name_en' => $r[4]
            ]);

        $group = Group::firstOrCreate([
            'name_ar' => $r[8],
            'sector_id' => $sector->id,
        ]);

        $category = Category::firstOrCreate([
            'name_ar' => $r[6],
            'group_id' => $group->id,
        ]);

        $date = \Carbon\Carbon::createFromFormat('Y-m-d', '1899-12-30')->addDays((int)$r[15]);
        $product = Product::firstOrCreate([
            'name_en' => $r[10],
            'name_ar' => $r[11],
            'description_en' => $r[13],
            'description_ar' => $r[12],
            'price_ceiling' => (float)$r[14],
            'effective_date' => $date->format('Y-m-d'),
            'category_id' => $category->id,
        ]);

        ProductType::firstOrCreate([
            // 'name_ar' => "القائمة الالزامية",
            // 'name_en' => "service",
            // 'name_ar' => "الاصناف غير الطبية",
            // 'name_en' => "non_medical",
            'name_ar' => "الاصناف الطبية",
            'name_en' => "medical",
            'product_id' => $product->id,
        ]);
    }   
}