@php use Illuminate\Support\Str; @endphp
<x-layouts.main title="Skills & Achievements - Abiya Makruf">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        <div class="relative mx-auto max-w-7xl px-6 text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-500/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-emerald-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                Expertise
            </div>
            <h1 class="text-5xl font-bold text-white md:text-6xl mb-4">Skills & Achievements</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">My technical stack, notable achievements, and published works</p>
        </div>
    </section>

    <section class="bg-gradient-to-br from-slate-50 to-white py-20">
        <div class="mx-auto max-w-7xl px-6 space-y-20"

            <!-- Skills by category -->
            <div>
                <div class="mb-10 flex items-center gap-3">
                    <div class="h-1 w-12 rounded-full bg-gradient-to-r from-sky-500 to-emerald-500"></div>
                    <h2 class="text-3xl font-bold text-slate-900">Technical Skills</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($skills as $category => $categorySkills)
                        <div class="group rounded-2xl border-2 border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:border-sky-500 hover:shadow-xl hover:-translate-y-1">
                            <div class="mb-6 flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900">{{ $category }}</h3>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($categorySkills as $skill)
                                    <div class="group/skill inline-flex items-center gap-2 rounded-lg border-2 border-slate-200 bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700 transition-all duration-300 hover:border-sky-500 hover:bg-sky-50 hover:text-sky-700 hover:shadow-md">
                                        @if($skill->icon_path)
                                            <img src="{{ $skill->icon_path }}" class="h-5 w-5 transition-transform group-hover/skill:scale-110" alt="">
                                        @endif
                                        {{ $skill->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Achievements -->
            <div>
                <div class="mb-10 flex items-center gap-3">
                    <div class="h-1 w-12 rounded-full bg-gradient-to-r from-emerald-500 to-sky-500"></div>
                    <h2 class="text-3xl font-bold text-slate-900">Achievements & Awards</h2>
                </div>
                <div class="grid gap-8 md:grid-cols-2">
                    @forelse($achievements as $achievement)
                        <article class="group overflow-hidden rounded-3xl border-2 border-slate-200 bg-white shadow-lg transition-all duration-500 hover:border-emerald-500 hover:shadow-2xl hover:-translate-y-2">
                            @if($achievement->image_path)
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ $achievement->image_path }}" 
                                         alt="{{ $achievement->title }}" 
                                         class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                                </div>
                            @endif
                            <div class="p-8 space-y-4">
                                <div class="flex items-center gap-3 text-sm">
                                    <div class="flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-emerald-700 font-semibold">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $achievement->date?->format('d M Y') ?? 'No date' }}
                                    </div>
                                    @if($achievement->certificate_url)
                                        <a href="{{ $achievement->certificate_url }}" target="_blank" 
                                           class="inline-flex items-center gap-1 rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-sky-700 font-semibold transition-colors hover:bg-sky-100">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Certificate
                                        </a>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 transition-colors group-hover:text-emerald-600">{{ $achievement->title }}</h3>
                                <p class="text-slate-600 leading-relaxed">{{ Str::limit($achievement->description, 200) }}</p>
                                @if($achievement->gallery)
                                    <div class="grid gap-3 grid-cols-3 pt-4">
                                        @foreach(array_slice($achievement->gallery,0,3) as $image)
                                            <div class="group/img relative aspect-square overflow-hidden rounded-xl border-2 border-slate-200 transition-all duration-300 hover:border-emerald-500 hover:shadow-lg">
                                                <img src="{{ $image }}" 
                                                     class="h-full w-full object-cover transition-transform duration-500 group-hover/img:scale-110" 
                                                     alt="Gallery">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="col-span-2 text-center py-16">
                            <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                                <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                            </div>
                            <p class="text-lg font-medium text-slate-900 mb-2">No achievements yet</p>
                            <p class="text-slate-500">Check back later for updates</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Publications -->
            <div>
                <div class="mb-10 flex items-center gap-3">
                    <div class="h-1 w-12 rounded-full bg-gradient-to-r from-sky-500 to-purple-500"></div>
                    <h2 class="text-3xl font-bold text-slate-900">Publications & Research</h2>
                </div>
                <div class="grid gap-8 md:grid-cols-2">
                    @forelse($publications as $pub)
                        <article class="group overflow-hidden rounded-3xl border-2 border-slate-200 bg-white shadow-lg transition-all duration-500 hover:border-sky-500 hover:shadow-2xl hover:-translate-y-2">
                            @if($pub->certificate_image_path)
                                <div class="relative h-56 overflow-hidden">
                                    <img src="{{ $pub->certificate_image_path }}" 
                                         alt="{{ $pub->title }}" 
                                         class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
                                </div>
                            @endif
                            <div class="p-8 space-y-4">
                                <div class="flex items-center gap-3 text-sm">
                                    <div class="flex items-center gap-2 rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-sky-700 font-semibold">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $pub->published_at?->format('d M Y') ?? 'No date' }}
                                    </div>
                                    @if($pub->doi_url)
                                        <a href="{{ $pub->doi_url }}" target="_blank" 
                                           class="inline-flex items-center gap-1 rounded-full border border-purple-200 bg-purple-50 px-3 py-1.5 text-purple-700 font-semibold transition-colors hover:bg-purple-100">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                            </svg>
                                            DOI Link
                                        </a>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 transition-colors group-hover:text-sky-600">{{ $pub->title }}</h3>
                                <p class="text-slate-600 leading-relaxed">{{ Str::limit($pub->description, 200) }}</p>
                                @if($pub->gallery)
                                    <div class="grid gap-3 grid-cols-3 pt-4">
                                        @foreach(array_slice($pub->gallery,0,3) as $image)
                                            <div class="group/img relative aspect-square overflow-hidden rounded-xl border-2 border-slate-200 transition-all duration-300 hover:border-sky-500 hover:shadow-lg">
                                                <img src="{{ $image }}" 
                                                     class="h-full w-full object-cover transition-transform duration-500 group-hover/img:scale-110" 
                                                     alt="Gallery">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="col-span-2 text-center py-16">
                            <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                                <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <p class="text-lg font-medium text-slate-900 mb-2">No publications yet</p>
                            <p class="text-slate-500">Check back later for research publications</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
