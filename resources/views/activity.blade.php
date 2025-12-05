<x-layouts.main title="Activity - Abiya Makruf">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        <div class="relative mx-auto max-w-7xl px-6 text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-500/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-emerald-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Latest Updates
            </div>
            <h1 class="text-5xl font-bold text-white md:text-6xl mb-4">Activity & Updates</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">Follow my latest work, thoughts, and achievements</p>
        </div>
    </section>

    <div class="bg-gradient-to-br from-slate-50 to-white py-20">
        <div class="mx-auto max-w-4xl px-6">
            <div class="space-y-8">
                @forelse($activities as $activity)
                    <article class="group overflow-hidden rounded-3xl border-2 border-slate-200 bg-white shadow-lg transition-all duration-500 hover:border-sky-500 hover:shadow-2xl hover:-translate-y-2">
                        @if($activity->thumbnail_path)
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $activity->thumbnail_path }}" 
                                     alt="{{ $activity->title }}" 
                                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                            </div>
                        @endif
                        <div class="p-8">
                            <div class="mb-6 flex flex-wrap items-center gap-4">
                                <time datetime="{{ $activity->published_at }}" 
                                      class="inline-flex items-center gap-2 rounded-full border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-semibold text-sky-700">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $activity->published_at ? $activity->published_at->format('F j, Y') : 'Draft' }}
                                </time>
                                @if($activity->tags)
                                    <div class="flex gap-2 flex-wrap">
                                        @foreach($activity->tags as $tag)
                                            <span class="rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">#{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <h2 class="mb-4 text-3xl font-bold text-slate-900 transition-colors group-hover:text-sky-600">{{ $activity->title }}</h2>
                            <div class="prose prose-slate max-w-none prose-headings:text-slate-900 prose-p:text-slate-600 prose-a:text-sky-600 prose-strong:font-semibold prose-li:text-slate-600">
                                {!! nl2br(e($activity->content)) !!}
                            </div>
                            @if($activity->gallery)
                                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                                    @foreach($activity->gallery as $image)
                                        <div class="group/img relative overflow-hidden rounded-2xl border-2 border-slate-200 transition-all duration-300 hover:border-sky-500 hover:shadow-lg">
                                            <img src="{{ $image }}" 
                                                 alt="Gallery image" 
                                                 class="h-48 w-full object-cover transition-transform duration-500 group-hover/img:scale-110">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="text-center py-20">
                        <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <p class="text-lg font-medium text-slate-900 mb-2">No recent activity</p>
                        <p class="text-slate-500">Check back later for updates</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if($activities->hasPages())
                    <div class="mt-12">
                        {{ $activities->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.main>
