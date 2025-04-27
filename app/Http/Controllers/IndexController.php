<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
                ->orderBy('products_count', 'desc')
                ->get()
                ->unique('name_ar');
        return view('index', compact('categories'));
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