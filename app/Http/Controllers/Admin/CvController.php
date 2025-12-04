<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CvFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
    {
        $latest = CvFile::latest()->first();
        return view('admin.cv.index', compact('latest'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:5120',
        ]);

        // Upload to GCS
        $path = $request->file('cv')->store('cv', 'gcs');
        $url = Storage::disk('gcs')->url($path);

        // Deactivate previous CVs
        CvFile::query()->update(['is_active' => false]);

        CvFile::create([
            'file_path' => $path,
            'is_active' => true,
            'public_url' => $url,
        ]);

        return redirect()->route('admin.cv.index')->with('success', 'CV uploaded to cloud storage.');
    }
}
