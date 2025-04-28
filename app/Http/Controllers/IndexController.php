<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\Sector;

class IndexController extends Controller
{
    public function index()
    {
        $sectos = Sector::withCount('groups')
                ->orderBy('groups_count', 'desc')
                ->get()
                ->unique('name_ar');
        return view('index', compact('sectos'));
    }

    public function showSectorGroups(Sector $sector)
    {
        $groups = Group::where('sector_id', $sector->id)
                ->withCount('categories')
                ->orderBy('categories_count', 'desc')
                ->get()
                ->unique('name_ar');

        return view('sectorGroup', compact('groups', 'sector'));
    }

    public function showGroupCategories(Group $group)
    {
        $categories = Category::where('group_id', $group->id)
                ->withCount('products')
                ->orderBy('products_count', 'desc')
                ->get()
                ->unique('name_ar');
                
        return view('groupCategories', compact('categories', 'group'));
    }

    public function showCategoryProducts(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();

        return view('categoryProducts', compact( 'products', 'category'));
    }

    public function showProduct(Product $product)
    {
        return view('product', compact('product'));
    }

}
