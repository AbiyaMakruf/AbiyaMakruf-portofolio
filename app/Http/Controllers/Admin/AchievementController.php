<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        [$image, $gallery, $certificateUrl] = $this->uploadImages($request);

        $payload = [
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'date' => $data['date'] ?? null,
            'certificate_url' => $certificateUrl ?? null,
            'image_path' => $image,
            'gallery' => $gallery,
        ];

        Achievement::create($payload);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created.');
    }

    public function edit(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $data = $this->validateData($request);

        [$image, $gallery, $certificateUrl] = $this->uploadImages($request);
        if ($image) {
            $data['image_path'] = $image;
        }
        if ($gallery) {
            $existing = $achievement->gallery ?? [];
            $data['gallery'] = array_values(array_filter(array_merge($existing, $gallery)));
        }
        if ($certificateUrl) {
            $data['certificate_url'] = $certificateUrl;
        }

        $achievement->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'date' => $data['date'] ?? null,
            'certificate_url' => $data['certificate_url'] ?? $achievement->certificate_url,
            'image_path' => $data['image_path'] ?? $achievement->image_path,
            'gallery' => $data['gallery'] ?? $achievement->gallery,
        ]);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated.');
    }

    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'certificate' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp|max:5120',
            'image' => 'nullable|image|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:4096',
        ]);
    }

    protected function uploadImages(Request $request): array
    {
        $imagePath = null;
        $gallery = [];
        $certificateUrl = null;

        if ($request->hasFile('certificate')) {
            $path = $request->file('certificate')->store('achievements/certificates', 'gcs');
            $certificateUrl = Storage::disk('gcs')->url($path);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('achievements', 'gcs');
            $imagePath = Storage::disk('gcs')->url($path);
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if (!$file) continue;
                $path = $file->store('achievements/gallery', 'gcs');
                $gallery[] = Storage::disk('gcs')->url($path);
            }
        }

        return [$imagePath, $gallery, $certificateUrl];
    }
}
