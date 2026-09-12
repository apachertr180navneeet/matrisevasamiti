<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Services\FileUploadService;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('sort_order', 'asc')->get();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.form', ['member' => new Member()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'category' => 'required|string|in:Board,Advisory,Core,Volunteer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::upload($request->file('photo'), 'members');
        } else {
            unset($data['photo']);
        }

        Member::create($data);
        return redirect()->route('admin.members.index')->with('success', 'Team member added successfully.');
    }

    public function edit(Member $member)
    {
        return view('admin.members.form', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'category' => 'required|string|in:Board,Advisory,Core,Volunteer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $member->sort_order;

        if ($request->hasFile('photo')) {
            $data['photo'] = FileUploadService::upload($request->file('photo'), 'members', $member->photo);
        } else {
            unset($data['photo']);
        }

        $member->update($data);
        return redirect()->route('admin.members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Member $member)
    {
        FileUploadService::delete($member->photo);
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully.');
    }
}
