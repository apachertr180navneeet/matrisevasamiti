<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsEvent;
use App\Services\FileUploadService;
use Illuminate\Support\Str;

class NewsEventController extends Controller
{
    public function index()
    {
        $items = NewsEvent::orderBy('sort_order', 'asc')->latest('published_date')->get();
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.form', ['item' => new NewsEvent()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_events,slug',
            'type' => 'required|string|in:news,event,media,press',
            'category' => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['published_date'] = $request->published_date ?? now();
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'news');
        } else {
            unset($data['image']);
        }

        NewsEvent::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Article / Event post created successfully.');
    }

    public function edit(NewsEvent $news)
    {
        return view('admin.news.form', ['item' => $news]);
    }

    public function update(Request $request, NewsEvent $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_events,slug,' . $news->id,
            'type' => 'required|string|in:news,event,media,press',
            'category' => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['sort_order'] = $request->sort_order ?? $news->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'news', $news->image);
        } else {
            unset($data['image']);
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Article / Event post updated successfully.');
    }

    public function destroy(NewsEvent $news)
    {
        FileUploadService::delete($news->image);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Article deleted successfully.');
    }
}
