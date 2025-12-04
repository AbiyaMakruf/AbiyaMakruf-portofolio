<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['thumbnail_path'] = $this->handleThumbnailUpload($request);
        $data['gallery'] = $this->handleGalleryUploads($request);

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $data = $this->validateData($request, $experience->id);

        if ($thumb = $this->handleThumbnailUpload($request)) {
            $data['thumbnail_path'] = $thumb;
        } else {
            $data['thumbnail_path'] = $experience->thumbnail_path;
        }

        $existingGallery = $experience->gallery ?? [];
        $newGallery = $this->handleGalleryUploads($request);
        $data['gallery'] = array_values(array_filter(array_merge($existingGallery, $newGallery)));

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted.');
    }

    /**
     * Validate and normalize experience data.
     */
    protected function validateData(Request $request, ?int $ignoreId = null): array
    {
        $slug = Str::slug(
            $request->input('slug') ?: ($request->input('company') . '-' . $request->input('role'))
        );

        $request->merge(['slug' => $slug]);

        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('experiences', 'slug')->ignore($ignoreId)],
            'category' => 'required|string|max:100',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'highlights' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:4096',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:4096',
        ]);

        $slug = $validated['slug'] ?? null;
        $highlights = $validated['highlights'] ?? '';

        return [
            'company' => $validated['company'],
            'role' => $validated['role'],
            'slug' => $slug,
            'category' => $validated['category'],
            'location' => $validated['location'] ?? null,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'] ?? null,
            'description' => $validated['description'] ?? null,
            'highlights' => $highlights ? array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $highlights)))) : null,
        ];
    }

    /**
     * Upload thumbnail to GCS and return public URL.
     */
    protected function handleThumbnailUpload(Request $request): ?string
    {
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('experiences/thumbnails', 'gcs');
            return Storage::disk('gcs')->url($path);
        }
        return null;
    }

    /**
     * Upload gallery images to GCS and return URL array.
     */
    protected function handleGalleryUploads(Request $request): array
    {
        $images = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if (!$file) {
                    continue;
                }
                $path = $file->store('experiences', 'gcs');
                $images[] = Storage::disk('gcs')->url($path);
            }
        }
        return $images;
    }
}
