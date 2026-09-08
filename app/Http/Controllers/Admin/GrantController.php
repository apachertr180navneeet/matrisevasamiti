<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grant;
use Illuminate\Support\Str;

class GrantController extends Controller
{
    public function index()
    {
        $grants = Grant::orderBy('sort_order', 'asc')->get();
        return view('admin.grants.index', compact('grants'));
    }

    public function create()
    {
        return view('admin.grants.form', ['grant' => new Grant()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:grants,slug',
            'category' => 'required|string|max:100',
            'badge_color' => 'nullable|string|in:primary,success,danger,warning,info,dark',
            'amount_range' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['badge_color'] = $request->badge_color ?? 'primary';
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('grants', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Grant::create($data);
        return redirect()->route('admin.grants.index')->with('success', 'Grant opportunity created successfully.');
    }

    public function edit(Grant $grant)
    {
        return view('admin.grants.form', compact('grant'));
    }

    public function update(Request $request, Grant $grant)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:grants,slug,' . $grant->id,
            'category' => 'required|string|max:100',
            'badge_color' => 'nullable|string|in:primary,success,danger,warning,info,dark',
            'amount_range' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'tags' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['badge_color'] = $request->badge_color ?? 'primary';
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('grants', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $grant->update($data);
        return redirect()->route('admin.grants.index')->with('success', 'Grant opportunity updated successfully.');
    }

    public function destroy(Grant $grant)
    {
        $grant->delete();
        return redirect()->route('admin.grants.index')->with('success', 'Grant opportunity deleted successfully.');
    }
}
