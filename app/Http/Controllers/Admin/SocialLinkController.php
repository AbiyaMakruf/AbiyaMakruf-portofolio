<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\SocialLink;
use App\Models\SiteSetting;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = SocialLink::all();
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.combined', compact('socials', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|image|max:2048',
            'icon_class' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['platform', 'url', 'icon_class']);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('socials/icons', 'gcs');
            $data['icon_path'] = Storage::disk('gcs')->url($path);
        }

        SocialLink::create($data);

        return back()->with('success', 'Social link added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SocialLink::findOrFail($id)->delete();
        return back()->with('success', 'Social link deleted successfully.');
    }
}
