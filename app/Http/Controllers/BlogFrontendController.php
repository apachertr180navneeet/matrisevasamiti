<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogFrontendController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategory = null;
        $query = Blog::with('category')->where('is_published', true)->latest('published_date');

        if ($request->filled('category')) {
            $selectedCategory = BlogCategory::where('slug', $request->category)->orWhere('id', $request->category)->first();
            if ($selectedCategory) {
                $query->where('blog_category_id', $selectedCategory->id);
            }
        }

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('meta_keywords', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(9)->withQueryString();

        $categories = BlogCategory::where('is_active', true)
            ->withCount(['blogs' => function ($q) {
                $q->where('is_published', true);
            }])
            ->having('blogs_count', '>', 0)
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $recentBlogs = Blog::where('is_published', true)
            ->latest('published_date')
            ->take(5)
            ->get();

        $page_title = 'Articles & Blogs - Matri Seva Samiti';
        $meta_description = 'Explore insightful articles, impact stories, and community news from Matri Seva Samiti on rural education, women empowerment, health awareness, and sustainable development.';

        return view('pages.blogs', compact('blogs', 'categories', 'selectedCategory', 'recentBlogs', 'page_title', 'meta_description'));
    }

    public function show(string $slug): View
    {
        $blog = Blog::with('category')
            ->where('is_published', true)
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)->orWhere('id', $slug);
            })
            ->firstOrFail();

        // Increment view count securely
        $blog->increment('views_count');

        // Related blogs
        $relatedBlogs = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->when($blog->blog_category_id, function ($q) use ($blog) {
                $q->where('blog_category_id', $blog->blog_category_id);
            })
            ->latest('published_date')
            ->take(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $moreBlogs = Blog::where('is_published', true)
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->latest('published_date')
                ->take(3 - $relatedBlogs->count())
                ->get();
            $relatedBlogs = $relatedBlogs->concat($moreBlogs);
        }

        // Recent blogs for sidebar
        $recentBlogs = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->latest('published_date')
            ->take(5)
            ->get();

        // Previous and Next blogs
        $prevBlog = Blog::where('is_published', true)
            ->where('id', '<', $blog->id)
            ->latest('id')
            ->first();

        $nextBlog = Blog::where('is_published', true)
            ->where('id', '>', $blog->id)
            ->oldest('id')
            ->first();

        // Active categories with counts
        $categories = BlogCategory::where('is_active', true)
            ->withCount(['blogs' => function ($q) {
                $q->where('is_published', true);
            }])
            ->having('blogs_count', '>', 0)
            ->orderBy('name')
            ->get();

        // SEO meta tags
        $page_title = $blog->effective_meta_title;
        $meta_description = $blog->effective_meta_description;
        $meta_keywords = $blog->meta_keywords ?? 'matri seva samiti, ngo, rural education, women empowerment, health camp';

        return view('pages.blog-detail', compact(
            'blog',
            'relatedBlogs',
            'recentBlogs',
            'prevBlog',
            'nextBlog',
            'categories',
            'page_title',
            'meta_description',
            'meta_keywords'
        ));
    }
}
