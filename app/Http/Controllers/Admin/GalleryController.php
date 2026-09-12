<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryItem;
use App\Services\FileUploadService;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderBy('sort_order', 'asc')->get();
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.form', ['item' => new GalleryItem()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 1;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'gallery');
        }

        GalleryItem::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Photo added to gallery successfully.');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.form', ['item' => $gallery]);
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $gallery->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'gallery', $gallery->image);
        } else {
            unset($data['image']);
        }

        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery photo updated successfully.');
    }

    public function destroy(GalleryItem $gallery)
    {
        FileUploadService::delete($gallery->image);
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery photo deleted successfully.');
    }
}
