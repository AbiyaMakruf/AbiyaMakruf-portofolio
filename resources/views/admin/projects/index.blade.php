<x-layouts.app title="Manage Projects">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Projects</p>
                <h1 class="text-2xl font-bold text-[#125C78]">Projects</h1>
                <p class="text-sm text-slate-500">Manage published and draft case studies.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                + Add Project
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($projects as $project)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $project->title }}</td>
                            <td class="px-6 py-4">{{ $project->category }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $project->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-[#00B3DB] hover:text-[#0A7396] font-semibold">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-confirm="Delete this project?" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
</x-layouts.app>
