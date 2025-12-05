<x-layouts.main title="Projects - Abiya Makruf">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        <div class="relative mx-auto max-w-7xl px-6 text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-sky-400/30 bg-sky-500/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-sky-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Portfolio
            </div>
            <h1 class="text-5xl font-bold text-white md:text-6xl mb-4">My Projects</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">Explore my work in Web Development, AI Integration, and Cloud Architecture</p>
        </div>
    </section>

    <div class="bg-gradient-to-br from-slate-50 to-white py-16">
        <div class="mx-auto max-w-7xl px-6">
            <!-- Filter -->
            <div class="mb-12">
                <p class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-500">Filter by Category</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('projects.index', ['category' => 'All']) }}" 
                       class="group relative overflow-hidden rounded-xl px-6 py-3 text-sm font-semibold transition-all duration-300 {{ request('category', 'All') === 'All' ? 'bg-gradient-to-r from-sky-600 to-emerald-600 text-white shadow-lg shadow-sky-500/30' : 'border-2 border-slate-200 bg-white text-slate-700 hover:border-sky-500 hover:text-sky-600' }}">
                        <span class="relative z-10">All Projects</span>
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('projects.index', ['category' => $category]) }}" 
                           class="group relative overflow-hidden rounded-xl px-6 py-3 text-sm font-semibold transition-all duration-300 {{ request('category') === $category ? 'bg-gradient-to-r from-sky-600 to-emerald-600 text-white shadow-lg shadow-sky-500/30' : 'border-2 border-slate-200 bg-white text-slate-700 hover:border-sky-500 hover:text-sky-600' }}">
                            <span class="relative z-10">{{ $category }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse($projects as $index => $project)
                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <!-- Image -->
                        <div class="relative aspect-video w-full overflow-hidden bg-slate-100">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" 
                                     alt="{{ $project->title }}" 
                                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex h-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                                    <svg class="h-16 w-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1 rounded-full border border-white/20 bg-white/90 backdrop-blur-sm px-3 py-1.5 text-xs font-semibold text-sky-700 shadow-lg">
                                    <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                    {{ $project->category }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-bold text-slate-900 transition-colors group-hover:text-sky-600">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm leading-relaxed text-slate-600 line-clamp-2">
                                {{ $project->short_description }}
                            </p>

                            <!-- View Project Link -->
                            <div class="flex items-center gap-2 text-sm font-semibold text-sky-600 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span>View Details</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>

                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0" aria-label="View {{ $project->title }}"></a>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-16">
                        <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-lg font-medium text-slate-900 mb-2">No projects found</p>
                        <p class="text-slate-500">Try adjusting your filters to see more results</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.main>
