<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::where('status', 'published');

        if ($request->has('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $projects = $query->latest()->get();
        $categories = Project::where('status', 'published')->distinct()->pluck('category');

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        if ($project->status !== 'published') {
            abort(404);
        }
        return view('projects.show', compact('project'));
    }
}
