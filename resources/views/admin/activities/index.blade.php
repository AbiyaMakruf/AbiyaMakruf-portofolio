<x-layouts.app title="Manage Activities">
    <div class="p-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Activities</h1>
            <a href="{{ route('admin.activities.create') }}" class="w-full sm:w-auto text-center rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                + Add Activity
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left text-sm text-slate-600 dark:text-slate-400">
                    <thead class="bg-slate-50 text-xs uppercase text-slate-500 dark:bg-slate-700 dark:text-slate-300">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Tags</th>
                            <th class="px-6 py-3">Published At</th>
                            <th class="px-6 py-3">Thumbnail</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                        @forelse($activities as $activity)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50">
                                <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">{{ $activity->title }}</td>
                                <td class="px-6 py-4">
                                    @if($activity->tags)
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($activity->tags as $tag)
                                                <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-semibold text-slate-700 dark:bg-slate-700 dark:text-white">#{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-xs text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $activity->published_at ? $activity->published_at->format('d M Y') : 'Draft' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($activity->thumbnail_path)
                                        <img src="{{ $activity->thumbnail_path }}" class="h-10 w-16 rounded object-cover" alt="thumbnail">
                                    @else
                                        <span class="text-xs text-slate-400">None</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex gap-3 items-center">
                                    <a href="{{ route('admin.activities.edit', $activity) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-confirm="Delete this activity?" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-500">No activities found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $activities->links() }}
        </div>
    </div>
</x-layouts.app>
