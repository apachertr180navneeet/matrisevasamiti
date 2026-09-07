<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Donation::latest();
        if ($request->filled('status')) {
            $query->where('order_status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('order_id', 'like', "%$s%")
                  ->orWhere('tracking_id', 'like', "%$s%")
                  ->orWhere('billing_name', 'like', "%$s%")
                  ->orWhere('billing_email', 'like', "%$s%")
                  ->orWhere('billing_tel', 'like', "%$s%");
            });
        }
        $donations = $query->paginate(15)->withQueryString();
        $totalAmount = Donation::where('order_status', 'Success')->sum('amount');
        return view('admin.donations.index', compact('donations', 'totalAmount'));
    }

    public function show(Donation $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function receipt(Donation $donation)
    {
        return view('admin.donations.receipt', compact('donation'));
    }
}
