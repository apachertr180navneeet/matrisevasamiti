<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Services\FileUploadService;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'location' => 'nullable|string|max:255',
            'beneficiaries' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'summary' => 'nullable|string',
            'details' => 'nullable|string',
            'status' => 'required|string|in:Ongoing,Completed,Upcoming',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'projects');
        } else {
            unset($data['image']);
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'location' => 'nullable|string|max:255',
            'beneficiaries' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'summary' => 'nullable|string',
            'details' => 'nullable|string',
            'status' => 'required|string|in:Ongoing,Completed,Upcoming',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $project->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'projects', $project->image);
        } else {
            unset($data['image']);
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        FileUploadService::delete($project->image);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
