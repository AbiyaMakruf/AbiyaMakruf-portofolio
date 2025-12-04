<x-layouts.main title="Projects - Abiya Makruf">
    <div class="bg-slate-50 py-24">
        <div class="mx-auto max-w-7xl px-6">
            <h1 class="mb-4 text-4xl font-bold text-[#125C78]">Projects</h1>
            <p class="mb-8 text-lg text-slate-600">A selection of my recent work in Web Development, AI, and Cloud.</p>

            <!-- Filter -->
            <div class="mb-12 flex flex-wrap gap-2">
                <a href="{{ route('projects.index', ['category' => 'All']) }}" 
                   class="rounded-full px-4 py-2 text-sm font-medium transition {{ request('category', 'All') === 'All' ? 'bg-[#125C78] text-white' : 'bg-white text-slate-600 hover:bg-slate-100' }}">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('projects.index', ['category' => $category]) }}" 
                       class="rounded-full px-4 py-2 text-sm font-medium transition {{ request('category') === $category ? 'bg-[#125C78] text-white' : 'bg-white text-slate-600 hover:bg-slate-100' }}">
                        {{ $category }}
                    </a>
                @endforeach
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                @forelse($projects as $project)
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="aspect-video w-full bg-slate-100 overflow-hidden">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full items-center justify-center text-slate-400">No Image</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="mb-2 flex items-center gap-2">
                                <span class="rounded-full bg-[#CEF9FF] px-2 py-1 text-xs font-medium text-[#0A7396]">{{ $project->category }}</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-slate-800">{{ $project->title }}</h3>
                            <p class="text-slate-600 line-clamp-2">{{ $project->short_description }}</p>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0"></a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">
                        No projects found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.main>
