<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductApplication;
use App\Models\Sector;
use Illuminate\Http\Client\Request;

class  MandatoryFormController extends Controller
{    
    public function create()
    {
        $sectors = Sector::all();
        $user = auth()->user();
        return view('mandatoryForm', compact('sectors', 'user'));
    }

    public function getGroups($sectorId)
    {
        return Group::where('sector_id', $sectorId)->get();
    }

    public function getCategories($groupId)
    {
        return Category::where('group_id', $groupId)->get();
    }

    public function getProducts($categoryId)
    {
        return Product::where('category_id', $categoryId)->get();
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Applicant Information
            'name' => 'required|string',
            'job_title' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            
            // Request Information
            'factory_country' => 'required|string',
            'sector' => 'required|string',
            'group_code' => 'required|string',
            'class_code' => 'required|string', // edit this to be category
            'item_code' => 'required|string',
            'product_type' => 'required|string',
            'factory_name' => 'required|string',
            'baseline_ratio' => 'nullable|numeric',
            'medical_code' => 'nullable|string',
            'medical_description' => 'nullable|string',
            
            // Contact Information
            'contact_email' => 'required|email',
            'website' => 'required|url',
            'phone' => 'required|string',
            'region' => 'required|string',
            'address' => 'required|string',
            
            // Company Information
            'commercial_registration' => 'required|string',
            'trade_name' => 'required|string',
            'license_number' => 'required|string',
            'local_certificate' => 'required|boolean',
            'local_percentage' => 'nullable|numeric',
            
            // Files
            'industrial_license' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'baseline_certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'medical_products_permit' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'other_permits' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            
            'additional_notes' => 'nullable|string',
        ]);
        
        // Handle file uploads
        $filePaths = [];
        foreach (['industrial_license', 'baseline_certificate', 'medical_products_permit', 'other_permits'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $path = $request->file($fileField)->store('public/documents');
                $filePaths[$fileField] = str_replace('public/', 'storage/', $path);
            }
        }
        
        // Create new record
        $application = new ProductApplication();
        $application->fill(array_merge($validated, $filePaths));
        // $application->user_id = auth()->id();
        $application->save();
        
        return redirect()->route('home')->with('success', 'تم تقديم الطلب بنجاح');
    }
}