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

        [$image, $gallery] = $this->uploadImages($request);
        $data['image_path'] = $image;
        $data['gallery'] = $gallery;

        Achievement::create($data);

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

        [$image, $gallery] = $this->uploadImages($request);
        if ($image) {
            $data['image_path'] = $image;
        }
        if ($gallery) {
            $existing = $achievement->gallery ?? [];
            $data['gallery'] = array_values(array_filter(array_merge($existing, $gallery)));
        }

        $achievement->update($data);

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
            'certificate_url' => 'nullable|url|max:500',
            'image' => 'nullable|image|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:4096',
        ]);
    }

    protected function uploadImages(Request $request): array
    {
        $imagePath = null;
        $gallery = [];

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

        return [$imagePath, $gallery];
    }
}
