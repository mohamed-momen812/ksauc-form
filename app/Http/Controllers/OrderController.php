<?php

namespace App\Http\Controllers;

use App\Models\MandatoryProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function adminOrder()
    {
        $orders = MandatoryProduct::all();
        return view('dashboard-admin.orders', compact( 'orders'));
    }

    public function userOrder()
    {
        $orders = MandatoryProduct::where('user_id', auth()->user()->id);
        return view('dashboard-user.orders', compact( 'orders'));
    }
}
