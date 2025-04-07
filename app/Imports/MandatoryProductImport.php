<?php

namespace App\Imports;

use App\Models\{Country, Sector, Group, Category, Product, ProductType};
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MandatoryProductImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {

        $r = $row->toArray();
        dd($r);


        // التعديل حسب الأسماء الفعلية في الملف
        $countryName = $r['country'] ?? null;
        $sectorName = $r['sector'] ?? null;
        $groupName = $r['group'] ?? null;
        $categoryName = $r['category'] ?? null;
        $productName = $r['product'] ?? null;
        $itemType = $r['item_type'] ?? null;

        if (!$countryName || !$sectorName || !$groupName || !$categoryName || !$productName) {
            return; // تجاهل الصف لو ناقص أي حاجة مهمة
        }

        // إنشاء أو استرجاع السجلات
        $country = Country::firstOrCreate(['name_en' => $countryName]);
        $sector = Sector::firstOrCreate(['name_en' => $sectorName]);
        $group = Group::firstOrCreate(['name_en' => $groupName, 'sector_id' => $sector->id]);
        $category = Category::firstOrCreate(['name_en' => $categoryName, 'group_id' => $group->id]);
        $product = Product::firstOrCreate([
            'name_en' => $productName,
            'country_id' => $country->id,
            'category_id' => $category->id,
        ]);

        if (!empty($itemType)) {
            ProductType::firstOrCreate([
                'name_en' => $itemType,
                'product_id' => $product->id,
            ]);
        }
    }
}
