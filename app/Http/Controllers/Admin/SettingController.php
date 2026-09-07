<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'site_logo', 'site_favicon']);

        // Handle text/config settings
        foreach ($data as $key => $value) {
            $group = 'general';
            if (str_starts_with($key, 'contact_') || $key === 'working_hours') $group = 'contact';
            elseif (str_ends_with($key, '_url')) $group = 'social';
            elseif (in_array($key, ['ngo_darpan_id', 'tax_exemption_80g', 'tax_exemption_12a', 'csr_registration_no', 'pan_number'])) $group = 'legal';
            elseif (str_starts_with($key, 'bank_') || $key === 'upi_id') $group = 'bank';

            SiteSetting::set($key, $value ?? '', $group);
        }

        // Handle logo upload
        if ($request->hasFile('site_logo')) {
            $request->validate(['site_logo' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048']);
            $path = $request->file('site_logo')->store('settings', 'public');
            SiteSetting::set('site_logo', 'storage/' . $path, 'general');
        }

        // Handle favicon upload
        if ($request->hasFile('site_favicon')) {
            $request->validate(['site_favicon' => 'image|mimes:jpeg,png,ico,svg|max:1024']);
            $path = $request->file('site_favicon')->store('settings', 'public');
            SiteSetting::set('site_favicon', 'storage/' . $path, 'general');
        }

        return back()->with('success', 'Site settings updated successfully.');
    }
}
