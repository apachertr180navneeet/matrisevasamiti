<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Services\FileUploadService;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('sort_order', 'asc')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.form', ['program' => new Program()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:programs,slug',
            'category' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'programs');
        } else {
            unset($data['image']);
        }

        Program::create($data);
        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.form', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:programs,slug,' . $program->id,
            'category' => 'nullable|string|max:100',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $program->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'programs', $program->image);
        } else {
            unset($data['image']);
        }

        $program->update($data);
        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        FileUploadService::delete($program->image);
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }
}
