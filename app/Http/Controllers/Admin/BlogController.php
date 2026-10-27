<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->latest('published_date');

        if ($request->filled('category')) {
            $query->where('blog_category_id', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('meta_keywords', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(12)->withQueryString();
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blogs.form', [
            'blog' => new Blog(),
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'author_name' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'published_date' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['published_date'] = $request->published_date ?? now();
        $data['author_name'] = $request->author_name ?? 'Matri Seva Samiti';

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'blogs');
        } else {
            unset($data['image']);
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blogs.form', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'author_name' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'published_date' => 'nullable|date',
            'is_published' => 'nullable|boolean',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['sort_order'] = $request->sort_order ?? $blog->sort_order;
        $data['published_date'] = $request->published_date ?? $blog->published_date;
        $data['author_name'] = $request->author_name ?? ($blog->author_name ?: 'Matri Seva Samiti');

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'blogs', $blog->image);
        } else {
            unset($data['image']);
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        FileUploadService::delete($blog->image);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article deleted successfully.');
    }
}
