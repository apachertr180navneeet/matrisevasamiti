<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order', 'asc')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.form', ['certificate' => new Certificate()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('certificates', 'public');
            $data['file_path'] = 'storage/' . $path;
        }

        Certificate::create($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Document / Certificate uploaded successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.form', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'file' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp|max:10240',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('certificates', 'public');
            $data['file_path'] = 'storage/' . $path;
        }

        $certificate->update($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Document / Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Document deleted.');
    }
}
