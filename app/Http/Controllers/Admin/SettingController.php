<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Services\FileUploadService;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'site_logo', 'site_favicon', 'about_image']);

        // Handle text/config settings
        foreach ($data as $key => $value) {
            $group = 'general';
            if (str_starts_with($key, 'contact_') || $key === 'working_hours') $group = 'contact';
            elseif (str_ends_with($key, '_url')) $group = 'social';
            elseif (in_array($key, ['ngo_darpan_id', 'tax_exemption_80g', 'tax_exemption_12a', 'csr_registration_no', 'pan_number'])) $group = 'legal';
            elseif (str_starts_with($key, 'bank_') || $key === 'upi_id') $group = 'bank';
            elseif (str_starts_with($key, 'about_') || str_starts_with($key, 'org_') || str_starts_with($key, 'impact_') || str_starts_with($key, 'stat_')) $group = 'about';

            SiteSetting::set($key, $value ?? '', $group);
        }

        // Handle logo upload
        if ($request->hasFile('site_logo')) {
            $request->validate(['site_logo' => 'image|mimes:jpeg,png,jpg,svg,webp,ico,gif|max:5120']);
            $oldLogo = SiteSetting::get('site_logo');
            $path = FileUploadService::upload($request->file('site_logo'), 'settings', $oldLogo);
            SiteSetting::set('site_logo', $path, 'general');
        }

        // Handle favicon upload
        if ($request->hasFile('site_favicon')) {
            $request->validate(['site_favicon' => 'image|mimes:jpeg,png,ico,svg,webp,gif|max:3072']);
            $oldFav = SiteSetting::get('site_favicon');
            $path = FileUploadService::upload($request->file('site_favicon'), 'settings', $oldFav);
            SiteSetting::set('site_favicon', $path, 'general');
        }

        // Handle about section image upload
        if ($request->hasFile('about_image')) {
            $request->validate(['about_image' => 'image|mimes:jpeg,png,jpg,webp,avif|max:5120']);
            $oldAbout = SiteSetting::get('about_image');
            $path = FileUploadService::upload($request->file('about_image'), 'settings', $oldAbout);
            SiteSetting::set('about_image', $path, 'about');
        }

        return back()->with('success', 'Site settings updated successfully.');
    }

    public function homeSections()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.home_sections.index', compact('settings'));
    }

    public function updateHomeSections(Request $request)
    {
        $data = $request->except(['_token', 'home_about_image', 'home_about_thumb_image', 'home_why_image', 'home_hero_image']);

        // Handle text settings
        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value ?? '', 'home_section');
        }

        // Handle image uploads
        $imageFields = ['home_about_image', 'home_about_thumb_image', 'home_why_image', 'home_hero_image'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $request->validate([$field => 'image|mimes:jpeg,png,jpg,webp,svg,gif,avif|max:5120']);
                $oldImg = SiteSetting::get($field);
                $path = FileUploadService::upload($request->file($field), 'home_sections', $oldImg);
                SiteSetting::set($field, $path, 'home_section');
            }
        }

        return back()->with('success', 'Home page sections and content updated successfully.');
    }
}
