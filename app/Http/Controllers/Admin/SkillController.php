<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortable = ['name', 'category', 'level', 'created_at'];
        $sort = in_array($request->get('sort'), $sortable) ? $request->get('sort') : 'created_at';
        $dir = $request->get('dir') === 'asc' ? 'asc' : 'desc';
        $allowedPerPage = [10, 15, 20, 50];
        $perPage = in_array((int) $request->get('per_page'), $allowedPerPage) ? (int) $request->get('per_page') : 10;

        $skills = Skill::orderBy($sort, $dir)->paginate($perPage)->appends([
            'sort' => $sort,
            'dir' => $dir,
            'per_page' => $perPage,
        ]);

        return view('admin.skills.index', compact('skills', 'sort', 'dir', 'perPage', 'allowedPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'icon_path' => 'nullable|string|max:500',
        ]);

        Skill::create($data);

        return redirect()->route('admin.skills.index')->with('success', 'Skill created.');
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
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'icon_path' => 'nullable|string|max:500',
        ]);

        $skill->update($data);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        $query = array_filter($request->only(['sort', 'dir', 'per_page', 'page']));

        return redirect()->route('admin.skills.index', $query)->with('success', 'Skill deleted.');
    }
}
