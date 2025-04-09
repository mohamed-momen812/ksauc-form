<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\MandatoryRequest;
use App\Models\Product;
use App\Models\Sector;
use Illuminate\Http\Request;

class MandatoryFormController extends Controller
{

    public function create()
    {
        $sectors = Sector::all();
        $groups = Group::all();
        $categories = Category::all();
        $products = Product::all();
        return view('dashboard-user.mandatoryForm', compact('sectors', 'groups', 'categories', 'products'));
    }

    public function getGroups($sectorId)
    {
        return Group::where('sector_id', $sectorId)->get();
    }

    public function getCategories($groupId)
    {
        return Category::where('group_id', $groupId)->get();
    }

    public function getProductsByCategory($categoryId, Request $request)
    {
        $itemType = $request->input('item_type');
        
        $query = Product::where('category_id', $categoryId)
                ->with('productTypes')
                ->select('id', 'name_ar', 'name_en', 'category_id');
        
        if ($itemType) {
            $query->whereHas('productTypes', function($q) use ($itemType) {
                $q->where('name_en', $itemType);
            });
        }
        
        return response()->json($query->get());
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'factory_country' => 'required|string|max:255',
            'factory_name' => 'required|string|max:255',
            'baseline_ratio' => 'nullable|string|max:100',
            'item_type' => 'required|string|in:medical,non_medical,service',
            'nupco_code' => 'nullable|string|max:100',
            'nupco_description' => 'nullable|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'group_id' => 'required|exists:groups,id',
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'email' => 'required|email|max:255',
            'website' => 'required|url|max:255',
            'phone' => 'required|string|max:20',
            'region' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'commercial_registration_number' => 'required|string|max:100',
            'registered_name' => 'required|string|max:255',
            'industrial_license_number' => 'required|string|max:100',
            'has_local_content_certificate' => 'required|boolean',
            'local_content_percentage' => 'nullable|numeric|min:0|max:100',
            'industrial_license' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'local_content_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'sfda_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png',
            'other_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'notes' => 'nullable|string|max:1000',
        ], [
            'required' => 'حقل :attribute مطلوب.',
            'email' => 'يجب أن يكون :attribute بريدًا إلكترونيًا صالحًا.',
            'url' => 'يجب أن يكون :attribute رابطًا صالحًا.',
            'max' => 'يجب ألا يتجاوز :attribute :max حرف/أحرف.',
            'mimes' => 'يجب أن يكون الملف من نوع: :values.',
            'file.max' => 'يجب ألا يتجاوز حجم الملف :max كيلوبايت.',
            'in' => 'القيمة المحددة لـ :attribute غير صالحة.',
            'numeric' => 'يجب أن يكون :attribute رقمًا.',
            'min' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
            'exists' => 'القيمة المحددة لـ :attribute غير صالحة.',
        ], [
            'factory_country' => 'بلد المصنع',
            'factory_name' => 'اسم المصنع',
            'item_type' => 'نوع الصنف',
            'sector_id' => 'القطاع',
            'group_id' => 'المجموعة',
            'category_id' => 'الفئة',
            'product_id' => 'المنتج',
            'commercial_registration_number' => 'رقم السجل التجاري',
            'registered_name' => 'الاسم التجاري',
            'industrial_license_number' => 'رقم الترخيص الصناعي',
            'has_local_content_certificate' => 'شهادة المحتوى المحلي',
            'industrial_license' => 'الترخيص الصناعي',
            'local_content_certificate' => 'شهادة المحتوى المحلي',
            'sfda_certificate' => 'تصريح هيئة الغذاء والدواء',
        ]);

        try {
            $data = $validated;
            $data['user_id'] = auth()->id();

            // Handle file uploads
            $data['industrial_license'] = $request->file('industrial_license')->store('mandatory/industrial_license', 'public');
            $data['local_content_certificate'] = $request->file('local_content_certificate')->store('mandatory/local_content_certificate', 'public');
            $data['sfda_certificate'] = $request->file('sfda_certificate')->store('mandatory/sfda_certificate', 'public');
            
            if ($request->hasFile('other_certificate')) {
                $data['other_certificate'] = $request->file('other_certificate')->store('mandatory/other_certificate', 'public');
            }

            MandatoryRequest::create($data);

            return redirect()->route('home')->with('success', 'تم إرسال الطلب بنجاح ✅');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage());
        }
    }

}