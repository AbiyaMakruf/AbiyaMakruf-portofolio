<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'full_description' => 'required|string',
            'category' => 'required|string',
            'tech_stack' => 'nullable|string', // Comma separated
            'github_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'gallery.*.image' => 'nullable|image|max:2048',
            'gallery.*.caption' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        // Handle Tech Stack (convert comma string to array)
        if (!empty($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        } else {
            $validated['tech_stack'] = [];
        }

        // Handle Thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects/thumbnails', 'gcs');
            $validated['thumbnail_path'] = Storage::disk('gcs')->url($path);
        }

        // Remove gallery placeholder from attributes; handled separately
        unset($validated['gallery']);
        unset($validated['thumbnail']);

        $project = Project::create($validated);

        // Handle Gallery Images
        if ($request->has('gallery')) {
            foreach ($request->gallery as $item) {
                if (isset($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $path = $item['image']->store('projects/gallery', 'gcs');
                    $project->images()->create([
                        'image_path' => Storage::disk('gcs')->url($path),
                        'caption' => $item['caption'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'full_description' => 'required|string',
            'category' => 'required|string',
            'tech_stack' => 'nullable|string',
            'github_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|max:2048',
            'gallery.*.image' => 'nullable|image|max:2048',
            'gallery.*.caption' => 'nullable|string|max:255',
            'existing_gallery.*.caption' => 'nullable|string|max:255',
            'delete_gallery' => 'nullable|array',
            'status' => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if (!empty($validated['tech_stack'])) {
            $validated['tech_stack'] = array_map('trim', explode(',', $validated['tech_stack']));
        } else {
            $validated['tech_stack'] = [];
        }

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects/thumbnails', 'gcs');
            $validated['thumbnail_path'] = Storage::disk('gcs')->url($path);
        }

        unset($validated['gallery']);
        unset($validated['thumbnail']);

        $project->update($validated);

        // Update existing gallery captions
        if ($request->has('existing_gallery')) {
            foreach ($request->existing_gallery as $id => $data) {
                $project->images()->where('id', $id)->update(['caption' => $data['caption']]);
            }
        }

        // Delete selected gallery images
        if ($request->has('delete_gallery')) {
            $ids = (array) $request->delete_gallery;
            $project->images()->whereIn('id', $ids)->delete();
            // Optionally delete files from storage if needed
        }

        // Handle New Gallery Images
        if ($request->has('gallery')) {
            foreach ($request->gallery as $item) {
                if (isset($item['image']) && $item['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $path = $item['image']->store('projects/gallery', 'gcs');
                    $project->images()->create([
                        'image_path' => Storage::disk('gcs')->url($path),
                        'caption' => $item['caption'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
