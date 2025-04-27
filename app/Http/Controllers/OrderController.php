<?php

namespace App\Http\Controllers;

use App\Models\MandatoryRequest;
use App\Models\Sector;
use App\Models\User;

class OrderController extends Controller
{
    public function adminOrder()
    {
        $orders = MandatoryRequest::all();
        return view('dashboard-admin.orders', compact( 'orders'));
    }

    public function confirm(MandatoryRequest $order)
    {
        if (!auth()->user()->isAdmin()) {
        abort(403);
        }

        $order->status = 'confirmed';
        $order->save();

        return redirect()->back()->with('success', 'تم تأكيد الطلب');
    }

    public function refuse(MandatoryRequest $order)
    {
        if (!auth()->user()->isAdmin()) {
        abort(403);
        }

        $order->status = 'refused';
        $order->save();

        return redirect()->back()->with('success', 'تم رفض الطلب');
    }


    
    public function showStatistics()
    {
        $totalOrders = MandatoryRequest::count();
        $confirmedOrders = MandatoryRequest::where('status', 'confirmed')->count();
        $refusedOrders = MandatoryRequest::where('status', 'refused')->count();
        $totalUsers = User::where('role', '!=', 'admin')->count();
        
        return view('dashboard-admin.statistics', compact('totalOrders', 'confirmedOrders', 'refusedOrders', 'totalUsers'));
    }
    
    public function userOrder()
    {
        $orders = MandatoryRequest::where('user_id', auth()->user()->id)->get();
        return view('dashboard-user.orders', compact( 'orders'));
    }

    public function showUserstatistics()
    {

        $userRequests = MandatoryRequest::where('user_id', auth()->id())->get();
        $ordersCount = $userRequests->count();
        $sectorIds = $userRequests->pluck('sector_id')->unique();

        $sectors = Sector::whereIn('id', $sectorIds)
                    ->withCount(['mandatoryRequests' => function ($q) {
                        $q->where('user_id', auth()->id());
                    }])
                    ->get();

        return view('dashboard-user.index', compact('ordersCount', 'sectors'));
    }
}
