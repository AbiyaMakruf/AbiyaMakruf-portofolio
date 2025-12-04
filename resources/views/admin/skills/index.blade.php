<x-layouts.app title="Manage Skills">
    @php
        $currentSort = $sort ?? 'created_at';
        $currentDir = $dir ?? 'desc';
        $nextDir = fn($column) => ($currentSort === $column && $currentDir === 'asc') ? 'desc' : 'asc';
        $sortUrl = fn($column) => request()->fullUrlWithQuery(['sort' => $column, 'dir' => $nextDir($column)]);
        $indicator = fn($column) => $currentSort === $column ? ($currentDir === 'asc' ? '↑' : '↓') : '';
    @endphp
    <div class="p-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Skills</p>
                <h1 class="text-2xl font-bold text-[#125C78]">Skills Management</h1>
                <p class="text-sm text-slate-500">Update the stacks and tools shown on the main site.</p>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <form method="GET" action="{{ route('admin.skills.index') }}" class="flex items-center gap-2 text-sm">
                    <input type="hidden" name="sort" value="{{ $currentSort }}">
                    <input type="hidden" name="dir" value="{{ $currentDir }}">
                    <label class="text-slate-600">Show</label>
                    <select name="per_page" onchange="this.form.submit()" class="rounded-lg border border-slate-200 px-2 py-1">
                        @foreach($allowedPerPage as $size)
                            <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                </form>
                <a href="{{ route('admin.skills.create') }}" class="w-full sm:w-auto text-center rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                    + Add Skill
                </a>
            </div>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
            <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-3">
                            <a href="{{ $sortUrl('name') }}" class="flex items-center gap-1 hover:text-[#00B3DB]">
                                Name <span class="text-[10px]">{{ $indicator('name') }}</span>
                            </a>
                        </th>
                        <th class="px-6 py-3">
                            <a href="{{ $sortUrl('category') }}" class="flex items-center gap-1 hover:text-[#00B3DB]">
                                Category <span class="text-[10px]">{{ $indicator('category') }}</span>
                            </a>
                        </th>
                        <th class="px-6 py-3">
                            <a href="{{ $sortUrl('level') }}" class="flex items-center gap-1 hover:text-[#00B3DB]">
                                Level <span class="text-[10px]">{{ $indicator('level') }}</span>
                            </a>
                        </th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($skills as $skill)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                <div class="flex items-center gap-3">
                                    @if($skill->icon_path)
                                        <img src="{{ $skill->icon_path }}" class="h-6 w-6" alt="">
                                    @endif
                                    {{ $skill->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $skill->category }}</td>
                            <td class="px-6 py-4">{{ $skill->level }}</td>
                            <td class="px-6 py-4 flex gap-3">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="text-[#00B3DB] hover:text-[#0A7396] font-semibold">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="per_page" value="{{ request('per_page', $perPage) }}">
                                    <input type="hidden" name="sort" value="{{ request('sort', $currentSort) }}">
                                    <input type="hidden" name="dir" value="{{ request('dir', $currentDir) }}">
                                    <input type="hidden" name="page" value="{{ request('page', 1) }}">
                                    <button type="button" data-confirm="Delete this skill?" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500">No skills found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $skills->links() }}
        </div>
    </div>
</x-layouts.app>
