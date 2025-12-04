<x-layouts.app title="Manage Education">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Education</p>
                <h1 class="text-2xl font-bold text-[#125C78]">Education Management</h1>
                <p class="text-sm text-slate-500">Update schools, programs, and their branding.</p>
            </div>
            <a href="{{ route('admin.educations.create') }}" class="rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                + Add Education
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-100 bg-white shadow-sm">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-3">Institution</th>
                        <th class="px-6 py-3">Program</th>
                        <th class="px-6 py-3">Years</th>
                        <th class="px-6 py-3">Thumbnail</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($educations as $education)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $education->institution }}</td>
                            <td class="px-6 py-4 text-slate-700">{{ $education->degree }} {{ $education->major ? ' - ' . $education->major : '' }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $education->start_date?->format('Y') }} - {{ $education->end_date ? $education->end_date->format('Y') : 'Present' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($education->thumbnail_path)
                                    <img src="{{ $education->thumbnail_path }}" alt="Logo" class="h-12 w-12 rounded-lg object-cover border border-slate-200">
                                @else
                                    <span class="text-xs text-slate-400">None</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-3">
                                <a href="{{ route('admin.educations.edit', $education) }}" class="text-[#00B3DB] hover:text-[#0A7396] font-semibold">Edit</a>
                                <form action="{{ route('admin.educations.destroy', $education) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-confirm="Delete this education?" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">No education records yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $educations->links() }}
        </div>
    </div>
</x-layouts.app>
