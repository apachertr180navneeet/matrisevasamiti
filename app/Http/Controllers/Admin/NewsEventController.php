<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsEvent;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        $data['published_date'] = $request->published_date ?? now();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = 'storage/' . $path;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['slug'] = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'Article / Event post updated successfully.');
    }

    public function destroy(NewsEvent $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Article deleted successfully.');
    }
}
