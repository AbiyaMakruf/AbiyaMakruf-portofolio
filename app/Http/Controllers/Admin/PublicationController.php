<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderByDesc('published_at')->paginate(10);
        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.publications.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        [$certificate, $gallery] = $this->uploadImages($request);

        $data['certificate_image_path'] = $certificate;
        $data['gallery'] = $gallery;

        Publication::create($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication created.');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $data = $this->validateData($request);
        [$certificate, $gallery] = $this->uploadImages($request);

        if ($certificate) {
            $data['certificate_image_path'] = $certificate;
        }
        if ($gallery) {
            $existing = $publication->gallery ?? [];
            $data['gallery'] = array_values(array_filter(array_merge($existing, $gallery)));
        }

        $publication->update($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication updated.');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('admin.publications.index')->with('success', 'Publication deleted.');
    }

    protected function validateData(Request $request): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'doi_url' => 'nullable|url|max:500',
            'description' => 'nullable|string',
            'certificate_image' => 'nullable|image|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:4096',
        ]);

        return [
            'title' => $validated['title'],
            'published_at' => $validated['published_at'] ?? null,
            'doi_url' => $validated['doi_url'] ?? null,
            'description' => $validated['description'] ?? null,
        ];
    }

    protected function uploadImages(Request $request): array
    {
        $certificate = null;
        $gallery = [];

        if ($request->hasFile('certificate_image')) {
            $path = $request->file('certificate_image')->store('publications', 'gcs');
            $certificate = Storage::disk('gcs')->url($path);
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if (!$file) {
                    continue;
                }
                $path = $file->store('publications/gallery', 'gcs');
                $gallery[] = Storage::disk('gcs')->url($path);
            }
        }

        return [$certificate, $gallery];
    }
}
