<x-layouts.app title="Manage Achievements">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Achievements</h1>
            <a href="{{ route('admin.achievements.create') }}" class="rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                + Add Achievement
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-400">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 dark:bg-slate-700 dark:text-slate-300">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Certificate</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($achievements as $achievement)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                            <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">{{ $achievement->title }}</td>
                            <td class="px-6 py-4">
                                {{ $achievement->date ? $achievement->date->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($achievement->certificate_url)
                                    <a href="{{ $achievement->certificate_url }}" target="_blank" class="text-[#00B3DB] hover:underline">Certificate</a>
                                @else
                                    <span class="text-xs text-slate-400">None</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-3 items-center">
                                <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-confirm="Delete this achievement?" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500">No achievements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $achievements->links() }}
        </div>
    </div>
</x-layouts.app>
