<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Activity;
use App\Models\CvFile;
use App\Models\Publication;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $latestProjects = Project::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $latestActivities = Activity::latest('published_at')->take(3)->get();
        $achievements = collect();
        if (Schema::hasTable('achievements')) {
            $achievements = Achievement::orderByDesc('date')->get();
        }

        return view('welcome', compact('latestProjects', 'latestActivities', 'achievements'));
    }

    public function skills()
    {
        $skills = Skill::all()->groupBy('category');
        $achievements = collect();
        $publications = collect();

        if (Schema::hasTable('achievements')) {
            $achievements = Achievement::orderByDesc('date')->get();
        }

        if (Schema::hasTable('publications')) {
            $publications = Publication::orderByDesc('published_at')->get();
        }

        return view('skills', compact('skills', 'achievements', 'publications'));
    }

    public function career()
    {
        $categoryOrder = ['Professional', 'Academic', 'Program', 'Organizational'];

        $grouped = Experience::orderByDesc('start_date')
            ->orderByDesc('end_date')
            ->get()
            ->groupBy(fn ($exp) => $exp->category ?? 'Professional')
            ->map->values();

        $ordered = collect($categoryOrder)
            ->filter(fn ($cat) => $grouped->has($cat))
            ->mapWithKeys(fn ($cat) => [$cat => $grouped->get($cat)]);

        $experiences = $ordered->union($grouped->except($categoryOrder));

        $educations = Education::orderBy('start_date', 'desc')->get();
        return view('career', compact('experiences', 'educations'));
    }

    public function careerShow(Experience $experience)
    {
        return view('career.show', compact('experience'));
    }

    public function activity()
    {
        $activities = Activity::latest('published_at')->paginate(10);
        return view('activity', compact('activities'));
    }

    public function downloadCv()
    {
        $latest = CvFile::where('is_active', true)->latest()->first()
            ?? CvFile::latest()->first();

        if (!$latest || !$latest->file_path) {
            return back()->with('error', 'CV file not found.');
        }

        // Force download from GCS when possible
        $disk = Storage::disk('gcs');
        if ($disk->exists($latest->file_path)) {
            $stream = $disk->readStream($latest->file_path);
            if ($stream) {
                return response()->streamDownload(
                    function () use ($stream) {
                        fpassthru($stream);
                        fclose($stream);
                    },
                    'Abiya_Makruf_CV.pdf',
                    ['Content-Type' => 'application/pdf']
                );
            }
        }

        // Fallback to public URL redirect if streaming fails
        if ($latest->public_url) {
            return redirect()->away($latest->public_url);
        }

        return back()->with('error', 'CV file not found.');
    }
}
