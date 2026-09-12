<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Services\FileUploadService;

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
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg,webp,doc,docx|max:15360',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 1;

        if ($request->hasFile('file')) {
            $data['file_path'] = FileUploadService::upload($request->file('file'), 'certificates');
        }
        unset($data['file']);

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
            'file' => 'nullable|file|mimes:pdf,jpeg,png,jpg,webp,doc,docx|max:15360',
            'year' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? $certificate->sort_order;

        if ($request->hasFile('file')) {
            $data['file_path'] = FileUploadService::upload($request->file('file'), 'certificates', $certificate->file_path);
        }
        unset($data['file']);

        $certificate->update($data);
        return redirect()->route('admin.certificates.index')->with('success', 'Document / Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        FileUploadService::delete($certificate->file_path);
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Document deleted successfully.');
    }
}
