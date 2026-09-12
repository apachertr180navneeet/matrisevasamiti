<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileUploadService
{
    /**
     * Upload a file directly to public/uploads/{folder}
     *
     * @param UploadedFile $file
     * @param string $folder Subfolder name under public/uploads
     * @param string|null $oldFile Optional existing file path to remove
     * @return string Relative path from public root (e.g. 'uploads/banners/banner-title_1726131623_abc123.jpg')
     */
    public static function upload(UploadedFile $file, string $folder, ?string $oldFile = null): string
    {
        // Clean up old uploaded file if provided
        if (!empty($oldFile)) {
            self::delete($oldFile);
        }

        $folder = trim(str_replace('\\', '/', $folder), '/');
        $targetDirectory = public_path('uploads/' . $folder);

        if (!File::exists($targetDirectory)) {
            File::makeDirectory($targetDirectory, 0775, true, true);
        }

        $originalExtension = $file->getClientOriginalExtension();
        $extension = strtolower($originalExtension ?: ($file->guessExtension() ?: 'png'));
        
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName);
        if (empty($safeName)) {
            $safeName = 'media';
        }
        $safeName = substr($safeName, 0, 35);

        $fileName = $safeName . '_' . time() . '_' . Str::lower(Str::random(6)) . '.' . $extension;

        $file->move($targetDirectory, $fileName);

        return 'uploads/' . $folder . '/' . $fileName;
    }

    /**
     * Delete an uploaded file from disk if it exists
     *
     * @param string|null $filePath
     * @return bool
     */
    public static function delete(?string $filePath): bool
    {
        if (empty($filePath)) {
            return false;
        }

        $cleanPath = ltrim(str_replace('\\', '/', $filePath), '/');

        // Protect default static theme assets
        if (
            str_starts_with($cleanPath, 'assets/') ||
            str_starts_with($cleanPath, 'images/') ||
            str_starts_with($cleanPath, 'logo/') ||
            str_starts_with($cleanPath, 'previouswebsite/') ||
            str_starts_with($cleanPath, 'perviouswebsite/')
        ) {
            return false;
        }

        // Handle legacy storage/ path
        if (str_starts_with($cleanPath, 'storage/')) {
            $storageSubPath = substr($cleanPath, 8);
            $fullStoragePath = storage_path('app/public/' . $storageSubPath);
            if (File::exists($fullStoragePath) && !File::isDirectory($fullStoragePath)) {
                @File::delete($fullStoragePath);
            }
        }

        $fullPublicPath = public_path($cleanPath);
        if (File::exists($fullPublicPath) && !File::isDirectory($fullPublicPath)) {
            return @File::delete($fullPublicPath);
        }

        return false;
    }
}
