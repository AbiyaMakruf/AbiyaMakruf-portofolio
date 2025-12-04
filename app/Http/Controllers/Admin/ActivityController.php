<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::latest()->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        [$thumb, $gallery] = $this->uploadImages($request);

        $data['thumbnail_path'] = $thumb;
        $data['gallery'] = $gallery;

        Activity::create($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activity created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::findOrFail($id);
        $data = $this->validateData($request, $activity->id);

        [$thumb, $gallery] = $this->uploadImages($request);

        if ($thumb) {
            $data['thumbnail_path'] = $thumb;
        }
        if ($gallery) {
            $existing = $activity->gallery ?? [];
            $data['gallery'] = array_values(array_filter(array_merge($existing, $gallery)));
        }

        $activity->update($data);

        return redirect()->route('admin.activities.index')->with('success', 'Activity updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('admin.activities.index')->with('success', 'Activity deleted.');
    }

    protected function validateData(Request $request, ?int $ignoreId = null): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:4096',
            'gallery_images.*' => 'nullable|image|max:4096',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $tags = $validated['tags'] ?? '';
        return [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'tags' => $tags ? array_values(array_filter(array_map('trim', preg_split('/[\\n,]+/', $tags)))) : null,
            'published_at' => $validated['published_at'] ?? null,
        ];
    }

    /**
     * Upload thumbnail and gallery images to GCS.
     */
    protected function uploadImages(Request $request): array
    {
        $thumbUrl = null;
        $galleryUrls = [];

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('activities', 'gcs');
            $thumbUrl = Storage::disk('gcs')->url($path);
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if (!$file) {
                    continue;
                }
                $path = $file->store('activities/gallery', 'gcs');
                $galleryUrls[] = Storage::disk('gcs')->url($path);
            }
        }

        return [$thumbUrl, $galleryUrls];
    }
}
