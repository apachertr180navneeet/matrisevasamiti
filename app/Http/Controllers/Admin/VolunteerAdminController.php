<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Volunteer::latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $volunteers = $query->paginate(15)->withQueryString();
        return view('admin.volunteers.index', compact('volunteers'));
    }

    public function show(Volunteer $volunteer)
    {
        return view('admin.volunteers.show', compact('volunteer'));
    }

    public function updateStatus(Request $request, Volunteer $volunteer)
    {
        $request->validate(['status' => 'required|in:pending,approved,rejected']);
        $volunteer->update(['status' => $request->status]);
        return back()->with('success', 'Volunteer status updated to ' . ucfirst($request->status) . '.');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('admin.volunteers.index')->with('success', 'Volunteer record deleted.');
    }
}
