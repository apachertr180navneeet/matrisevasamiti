<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsEvent;
use App\Services\FileUploadService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class NewsEventController extends Controller
{
    /**
     * Get a unique, sorted list of categories
     */
    protected function getCategoriesList(): array
    {
        $defaultCategories = [
            'Health Camp',
            'Education',
            'CSR & Grants',
            'Women Empowerment',
            'Community Event',
            'Press Release',
            'Media Coverage',
            'Skill Development',
            'NGO Update',
        ];

        $dbCategories = NewsEvent::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();

        $merged = array_unique(array_filter(array_merge($defaultCategories, $dbCategories)));
        sort($merged);
        return $merged;
    }

    public function index()
    {
        $items = NewsEvent::orderBy('sort_order', 'asc')->latest('published_date')->get();
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        $categories = $this->getCategoriesList();
        return view('admin.news.form', [
            'item' => new NewsEvent(),
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_events,slug',
            'type' => 'nullable|string|in:news,blog,event,media,press',
            'category' => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $baseSlug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;
        while (NewsEvent::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }
        $data['slug'] = $slug;

        $data['excerpt'] = $request->input('short_description', $request->input('excerpt'));
        $data['type'] = $request->input('type', 'news');
        $data['is_published'] = $request->has('is_published');
        $data['published_date'] = $request->published_date ?? now();
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'news');
        } else {
            unset($data['image']);
        }

        NewsEvent::create($data);

        Cache::forget('page_news_all');
        Cache::forget('page_home_news');
        Cache::forget('page_home_events');
        Cache::forget('app_footer_news');

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    public function edit(NewsEvent $news)
    {
        $categories = $this->getCategoriesList();
        return view('admin.news.form', [
            'item' => $news,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, NewsEvent $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_events,slug,' . $news->id,
            'type' => 'nullable|string|in:news,blog,event,media,press',
            'category' => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'short_description' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'remove_image' => 'nullable|boolean',
        ]);

        $baseSlug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;
        while (NewsEvent::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }
        $data['slug'] = $slug;

        $data['excerpt'] = $request->input('short_description', $request->input('excerpt', $news->excerpt));
        if ($request->filled('type')) {
            $data['type'] = $request->type;
        }
        $data['is_published'] = $request->has('is_published');
        $data['sort_order'] = $request->sort_order ?? $news->sort_order;

        if ($request->boolean('remove_image')) {
            if ($news->image) {
                FileUploadService::delete($news->image);
            }
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'news', $news->image);
        } else {
            unset($data['image']);
        }

        $news->update($data);

        Cache::forget('page_news_all');
        Cache::forget('page_home_news');
        Cache::forget('page_home_events');
        Cache::forget('app_footer_news');

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(NewsEvent $news)
    {
        if ($news->image) {
            FileUploadService::delete($news->image);
        }
        $news->delete();

        Cache::forget('page_news_all');
        Cache::forget('page_home_news');
        Cache::forget('page_home_events');
        Cache::forget('app_footer_news');

        return redirect()->route('admin.news.index')->with('success', 'Article deleted successfully.');
    }
}
