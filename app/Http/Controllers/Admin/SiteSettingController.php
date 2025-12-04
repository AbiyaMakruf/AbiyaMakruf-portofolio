<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\SiteSetting;
use App\Models\SocialLink;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $socials = SocialLink::all();
        return view('admin.settings.combined', compact('settings', 'socials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        if ($request->hasFile('about_photo')) {
            $path = $request->file('about_photo')->store('profile', 'gcs');
            $data['about_photo_url'] = Storage::disk('gcs')->url($path);
        }
        unset($data['about_photo']);
        
        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Settings updated successfully.');
    }
}
