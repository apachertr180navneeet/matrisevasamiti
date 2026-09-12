<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Services\FileUploadService;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.form', ['banner' => new Banner()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'btn_text' => 'nullable|string|max:100',
            'btn_link' => 'nullable|string|max:255',
            'secondary_btn_text' => 'nullable|string|max:100',
            'secondary_btn_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 1;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'banners');
        } else {
            unset($data['image']);
        }

        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.form', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            'btn_text' => 'nullable|string|max:100',
            'btn_link' => 'nullable|string|max:255',
            'secondary_btn_text' => 'nullable|string|max:100',
            'secondary_btn_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $banner->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadService::upload($request->file('image'), 'banners', $banner->image);
        } else {
            unset($data['image']);
        }

        $banner->update($data);
        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        FileUploadService::delete($banner->image);
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
