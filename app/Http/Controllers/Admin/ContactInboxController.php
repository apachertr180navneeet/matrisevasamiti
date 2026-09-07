<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactInboxController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::latest();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        $contacts = $query->paginate(15)->withQueryString();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'contacted']);
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate(['status' => 'required|in:unread,contacted,resolved']);
        $contact->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted.');
    }
}
