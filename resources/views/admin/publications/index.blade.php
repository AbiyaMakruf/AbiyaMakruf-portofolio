x-layouts.app title="Manage Publications">
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-900">Publications</h1>
            <a href="{{ route('admin.publications.create') }}" class="rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                + Add Publication
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Published</th>
                        <th class="px-6 py-3">DOI</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($publications as $pub)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $pub->title }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $pub->published_at?->format('d M Y') ?? '—' }}</td>
                            <td class="px-6 py-4 text-slate-600">
                                @if($pub->doi_url)
                                    <a href="{{ $pub->doi_url }}" target="_blank" class="text-[#00B3DB] hover:underline">DOI Link</a>
                                @else
                                    <span class="text-xs text-slate-400">None</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <a href="{{ route('admin.publications.edit', $pub) }}" class="text-[#00B3DB] hover:text-[#0A7396] font-semibold">Edit</a>
                                <form action="{{ route('admin.publications.destroy', $pub) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-confirm="Delete this publication?" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-slate-500">No publications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $publications->links() }}
        </div>
    </div>
</x-layouts.app>
