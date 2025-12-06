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
                    <div class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl flex flex-col">
                        <a href="{{ route('projects.show', $project) }}" class="block">
                            <div class="aspect-video w-full bg-slate-100 overflow-hidden">
                                @if($project->thumbnail_path)
                                    <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                @else
                                    <div class="flex h-full items-center justify-center text-slate-400">No Image</div>
                                @endif
                            </div>
                        </a>
                        <div class="p-6 flex-1 flex flex-col gap-3">
                            <div class="flex items-center gap-2">
                                <span class="rounded-full bg-[#CEF9FF] px-2 py-1 text-xs font-medium text-[#0A7396]">{{ $project->category }}</span>
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="block space-y-2">
                                <h3 class="text-xl font-bold text-slate-800">{{ $project->title }}</h3>
                                <p class="text-slate-600 line-clamp-2">{{ $project->short_description }}</p>
                                <span class="text-sm font-semibold text-[#00B3DB]">Read more →</span>
                            </a>
                            <div class="flex flex-wrap gap-2 pt-2">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-[#00B3DB] hover:text-[#00B3DB] transition">
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.387.6.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.763-1.604-2.666-.305-5.468-1.334-5.468-5.931 0-1.31.469-2.381 1.236-3.221-.125-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.52 11.52 0 012.994-.404c1.018.005 2.046.137 3.005.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.607-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .318.193.692.8.576C20.565 21.796 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                                        View on GitHub
                                    </a>
                                @endif
                                @if($project->website_url)
                                    <a href="{{ $project->website_url }}" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:border-[#00B3DB] hover:text-[#00B3DB] transition">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                                        Visit Website
                                    </a>
                                @endif
                            </div>
                        </div>
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
