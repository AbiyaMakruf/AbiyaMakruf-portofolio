<x-layouts.app title="Manage Career">
    <div class="p-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Career / Experience</h1>
            <a href="{{ route('admin.experiences.create') }}" class="w-full sm:w-auto text-center rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                + Add Experience
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 dark:bg-slate-700 dark:text-slate-300">
                    <tr>
                        <th class="px-6 py-3">Company</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Duration</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($experiences as $experience)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                            <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">{{ $experience->company }}</td>
                            <td class="px-6 py-4">{{ $experience->role }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700 dark:bg-slate-700 dark:text-white">
                                    {{ $experience->category ?? 'Professional' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $experience->start_date->format('M Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                            </td>
                            <td class="px-6 py-4 flex gap-3 items-center">
                                <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-confirm="Delete this experience?" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">No experiences found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $experiences->links() }}
        </div>
    </div>
</x-layouts.app>
