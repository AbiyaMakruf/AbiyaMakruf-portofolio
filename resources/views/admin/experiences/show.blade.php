<x-layouts.app title="Experience Detail">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $experience->role }}</h1>
                <p class="text-sm text-slate-500">{{ $experience->company }} &bull; {{ $experience->category }}</p>
            </div>
            <a href="{{ route('admin.experiences.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800 space-y-4">
            <div class="flex flex-wrap items-center gap-3 text-sm text-slate-600 dark:text-slate-300">
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700 dark:bg-slate-700 dark:text-white">{{ $experience->category }}</span>
                <span>{{ $experience->location }}</span>
                <span>
                    {{ $experience->start_date?->format('M Y') }} - 
                    {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                </span>
            </div>

            @if($experience->description)
                <p class="text-slate-700 dark:text-slate-200">{{ $experience->description }}</p>
            @endif

            @if($experience->highlights)
                <div>
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-2">Highlights</h3>
                    <ul class="list-disc list-inside text-slate-700 dark:text-slate-200 space-y-1">
                        @foreach($experience->highlights as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($experience->gallery)
                <div>
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-3">Gallery</h3>
                    <div class="grid gap-3 sm:grid-cols-2">
                        @foreach($experience->gallery as $image)
                            <div class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700">
                                <img src="{{ $image }}" alt="Gallery image" class="h-40 w-full object-cover">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex gap-3">
                <a href="{{ route('admin.experiences.edit', $experience) }}" class="rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                    Edit
                </a>
                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-confirm="Delete this experience?" class="rounded-lg bg-red-100 px-4 py-2 text-sm font-semibold text-red-700 hover:bg-red-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
