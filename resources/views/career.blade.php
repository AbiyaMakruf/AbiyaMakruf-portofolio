<x-layouts.main title="Career - Abiya Makruf">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        <div class="relative mx-auto max-w-7xl px-6 text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-purple-400/30 bg-purple-500/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-purple-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Professional Journey
            </div>
            <h1 class="text-5xl font-bold text-white md:text-6xl mb-4">Career History</h1>
            <p class="text-lg text-slate-300 max-w-2xl mx-auto">My professional experience and educational background</p>
        </div>
    </section>

    <div class="bg-gradient-to-br from-white to-slate-50 py-24">
        <div class="mx-auto max-w-5xl px-6 space-y-20">
            <!-- Experience Section -->
            <div>
                <div class="mb-12 flex items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-500 to-emerald-500 text-white shadow-xl shadow-sky-500/30">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900">Work Experience</h2>
                        <p class="text-slate-600">Professional roles and contributions</p>
                    </div>
                </div>
                @foreach($experiences as $category => $items)
                    <div class="mb-12">
                        <div class="mb-8 inline-flex items-center gap-2 rounded-full border-2 border-sky-200 bg-sky-50 px-4 py-2 text-sm font-bold uppercase tracking-wide text-sky-700">
                            <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                            {{ $category }}
                        </div>
                        <div class="relative space-y-8 border-l-4 border-slate-200 pl-10 ml-8">
                            @foreach($items as $experience)
                                <a href="{{ route('career.show', $experience->slug ?? $experience) }}" 
                                   class="group block relative transition-all duration-300 hover:pl-2">
                                    <!-- Timeline dot -->
                                    <span class="absolute -left-[45px] top-2 flex h-8 w-8 items-center justify-center rounded-full border-4 border-white bg-gradient-to-br from-sky-500 to-emerald-500 shadow-lg shadow-sky-500/30 transition-all duration-300 group-hover:scale-125 group-hover:shadow-xl group-hover:shadow-sky-500/40"></span>
                                    
                                    <!-- Card -->
                                    <div class="overflow-hidden rounded-2xl border-2 border-slate-200 bg-white shadow-lg transition-all duration-300 group-hover:border-sky-500 group-hover:shadow-2xl group-hover:-translate-y-1">
                                        <div class="flex gap-6 p-6">
                                            @if($experience->thumbnail_path)
                                                <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl border-2 border-slate-200 shadow-md transition-all duration-300 group-hover:border-sky-500 group-hover:shadow-lg">
                                                    <img src="{{ $experience->thumbnail_path }}" alt="Logo" class="h-full w-full object-cover">
                                                </div>
                                            @endif
                                            <div class="flex-1 space-y-3">
                                                <div class="flex items-start justify-between gap-4">
                                                    <h3 class="text-2xl font-bold text-slate-900 transition-colors group-hover:text-sky-600">{{ $experience->role }}</h3>
                                                    <span class="shrink-0 rounded-full border border-sky-200 bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-700">
                                                        {{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                                    </span>
                                                </div>
                                                <div class="flex items-center gap-2 text-lg font-semibold text-sky-600">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                    {{ $experience->company }}
                                                </div>
                                                <p class="text-slate-600 leading-relaxed">{{ $experience->description }}</p>
                                                @if($experience->highlights)
                                                    <ul class="grid gap-2 sm:grid-cols-2 pt-2">
                                                        @foreach(array_slice($experience->highlights, 0, 4) as $item)
                                                            <li class="flex items-start gap-2 text-sm text-slate-600">
                                                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-emerald-500"></span>
                                                                <span>{{ $item }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Education Section -->
            <div>
                <div class="mb-12 flex items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 text-white shadow-xl shadow-purple-500/30">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900">Education</h2>
                        <p class="text-slate-600">Academic background and qualifications</p>
                    </div>
                </div>

                <div class="relative space-y-12 border-l-4 border-slate-200 pl-10 ml-8">
                    @foreach($educations as $education)
                        <div class="relative group">
                            <!-- Timeline dot -->
                            <span class="absolute -left-[45px] top-2 flex h-8 w-8 items-center justify-center rounded-full border-4 border-white bg-gradient-to-br from-purple-500 to-pink-500 shadow-lg shadow-purple-500/30 transition-all duration-300 group-hover:scale-125 group-hover:shadow-xl group-hover:shadow-purple-500/40"></span>
                            
                            <!-- Card -->
                            <div class="overflow-hidden rounded-2xl border-2 border-slate-200 bg-white p-8 shadow-lg transition-all duration-300 group-hover:border-purple-500 group-hover:shadow-2xl group-hover:-translate-y-1">
                                <div class="flex gap-6 items-start">
                                    @if($education->thumbnail_path)
                                        <div class="h-20 w-20 shrink-0 overflow-hidden rounded-xl border-2 border-slate-200 shadow-md transition-all duration-300 group-hover:border-purple-500 group-hover:shadow-lg">
                                            <img src="{{ $education->thumbnail_path }}" alt="{{ $education->institution }}" class="h-full w-full object-cover">
                                        </div>
                                    @endif
                                    <div class="flex-1 space-y-3">
                                        <div class="flex items-start justify-between gap-4">
                                            <h3 class="text-2xl font-bold text-slate-900 transition-colors group-hover:text-purple-600">{{ $education->institution }}</h3>
                                            <span class="shrink-0 rounded-full border border-purple-200 bg-purple-50 px-3 py-1.5 text-xs font-bold text-purple-700">
                                                {{ $education->start_date->format('Y') }} - {{ $education->end_date ? $education->end_date->format('Y') : 'Present' }}
                                            </span>
                                        </div>
                                        <div class="flex items-center gap-2 text-lg font-semibold text-purple-600">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            {{ $education->degree }} {{ $education->major ? 'in ' . $education->major : '' }}
                                        </div>
                                        @if($education->description)
                                            <p class="text-slate-600 leading-relaxed">{{ $education->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
                                            <p class="text-slate-600 leading-relaxed">{{ $education->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
