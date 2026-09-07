<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Volunteer;
use App\Models\Contact;
use App\Models\Cause;
use App\Models\Program;
use App\Models\Project;
use App\Models\Member;
use App\Models\GalleryItem;
use App\Models\NewsEvent;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonationsAmount = Donation::where('order_status', 'Success')->sum('amount');
        $totalDonationsCount = Donation::count();
        $totalVolunteers = Volunteer::count();
        $pendingVolunteers = Volunteer::where('status', 'pending')->count();
        $totalContacts = Contact::count();
        $unreadContacts = Contact::where('status', 'unread')->count();
        $totalCauses = Cause::count();
        $totalPrograms = Program::count();
        $totalProjects = Project::count();
        $totalMembers = Member::count();
        $totalGallery = GalleryItem::count();
        $totalNews = NewsEvent::count();

        $recentDonations = Donation::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $recentVolunteers = Volunteer::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalDonationsAmount',
            'totalDonationsCount',
            'totalVolunteers',
            'pendingVolunteers',
            'totalContacts',
            'unreadContacts',
            'totalCauses',
            'totalPrograms',
            'totalProjects',
            'totalMembers',
            'totalGallery',
            'totalNews',
            'recentDonations',
            'recentContacts',
            'recentVolunteers'
        ));
    }
}
