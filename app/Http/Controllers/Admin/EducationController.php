<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderByDesc('start_date')->paginate(10);
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['thumbnail_path'] = $this->uploadThumbnail($request);

        Education::create($data);

        return redirect()->route('admin.educations.index')->with('success', 'Education created.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $data = $this->validateData($request);

        if ($thumb = $this->uploadThumbnail($request)) {
            $data['thumbnail_path'] = $thumb;
        } else {
            $data['thumbnail_path'] = $education->thumbnail_path;
        }

        $education->update($data);

        return redirect()->route('admin.educations.index')->with('success', 'Education updated.');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.educations.index')->with('success', 'Education deleted.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'major' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:4096',
        ]);
    }

    protected function uploadThumbnail(Request $request): ?string
    {
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('educations/thumbnails', 'gcs');
            return Storage::disk('gcs')->url($path);
        }
        return null;
    }
}
