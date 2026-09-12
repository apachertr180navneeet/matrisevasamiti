<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cause;
use App\Services\FileUploadService;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['raised_amount'] = $request->raised_amount ?? 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'causes');
        } else {
            unset($data['image']);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');
        $data['raised_amount'] = $request->raised_amount ?? 0;
        $data['sort_order'] = $request->sort_order ?? $cause->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'causes', $cause->image);
        } else {
            unset($data['image']);
        }

        $cause->update($data);
        return redirect()->route('admin.causes.index')->with('success', 'Cause / Campaign updated successfully.');
    }

    public function destroy(Cause $cause)
    {
        FileUploadService::delete($cause->image);
        $cause->delete();
        return redirect()->route('admin.causes.index')->with('success', 'Cause deleted successfully.');
    }
}
