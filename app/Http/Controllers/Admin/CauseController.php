<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cause;
use Illuminate\Support\Str;

class CauseController extends Controller
{
    public function index()
    {
        $causes = Cause::orderBy('sort_order', 'asc')->get();
        return view('admin.causes.index', compact('causes'));
    }

    public function create()
    {
        return view('admin.causes.form', ['cause' => new Cause()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:causes,slug',
            'category' => 'required|string|max:100',
            'goal_amount' => 'required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['raised_amount'] = $request->raised_amount ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('causes', 'public');
            $data['image'] = 'storage/' . $path;
        }

        Cause::create($data);
        return redirect()->route('admin.causes.index')->with('success', 'Cause / Campaign created successfully.');
    }

    public function edit(Cause $cause)
    {
        return view('admin.causes.form', compact('cause'));
    }

    public function update(Request $request, Cause $cause)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:causes,slug,' . $cause->id,
            'category' => 'required|string|max:100',
            'goal_amount' => 'required|numeric|min:0',
            'raised_amount' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['raised_amount'] = $request->raised_amount ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('causes', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $cause->update($data);
        return redirect()->route('admin.causes.index')->with('success', 'Cause / Campaign updated successfully.');
    }

    public function destroy(Cause $cause)
    {
        $cause->delete();
        return redirect()->route('admin.causes.index')->with('success', 'Cause deleted successfully.');
    }
}
