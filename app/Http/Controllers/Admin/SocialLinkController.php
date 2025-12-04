<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        ]);

        SocialLink::create($request->all());

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
