<?php

namespace App\Http\Controllers;

use App\Models\MandatoryRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function adminOrder()
    {
        $orders = MandatoryRequest::all();
        return view('dashboard-admin.orders', compact( 'orders'));
    }

    public function userOrder()
    {
        $orders = MandatoryRequest::where('user_id', auth()->user()->id)->get();
        return view('dashboard-user.orders', compact( 'orders'));
    }
}
