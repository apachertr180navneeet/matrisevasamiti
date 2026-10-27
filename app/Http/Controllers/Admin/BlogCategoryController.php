<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.blogs.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        BlogCategory::create($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog category created successfully.');
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->name);
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $blogCategory->sort_order;

        $blogCategory->update($data);

        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogsCount = $blogCategory->blogs()->count();
        if ($blogsCount > 0) {
            // Reassign blogs to null category before deleting
            $blogCategory->blogs()->update(['blog_category_id' => null]);
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')->with('success', 'Blog category deleted successfully.');
    }
}
