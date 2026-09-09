<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('sort_order', 'asc')->latest()->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.form', ['career' => new Career()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:careers,slug',
            'job_type' => 'required|string|max:100',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'stipend_salary' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        Career::create($data);
        return redirect()->route('admin.careers.index')->with('success', 'Job / Career opening added successfully.');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.form', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:careers,slug,' . $career->id,
            'job_type' => 'required|string|max:100',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'stipend_salary' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        $career->update($data);
        return redirect()->route('admin.careers.index')->with('success', 'Job / Career opening updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Job opening deleted successfully.');
    }
}
