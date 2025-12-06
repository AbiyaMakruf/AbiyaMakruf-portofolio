<x-layouts.main title="Career - Abiya Makruf">
    <div class="bg-white py-24">
        <div class="mx-auto max-w-4xl px-6">
            <h1 class="mb-12 text-4xl font-bold text-[#125C78]">Career History</h1>

            <div class="mb-16">
                <h2 class="mb-8 text-2xl font-bold text-[#0A7396] flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#CEF9FF] text-[#0A7396]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </span>
                    Experience
                </h2>
                @foreach($experiences as $category => $items)
                    <div class="mb-8">
                        <div class="mb-4 flex items-center gap-2 text-sm font-semibold uppercase tracking-wide text-slate-500">
                            <span class="h-2 w-2 rounded-full bg-[#00B3DB]"></span>
                            {{ $category }}
                        </div>
                        <div class="space-y-8 border-l-2 border-slate-100 pl-8 ml-4">
                            @foreach($items as $experience)
                                <a href="{{ route('career.show', $experience->slug ?? $experience) }}" class="block relative group">
                                    <span class="absolute -left-[41px] top-1 h-5 w-5 rounded-full border-4 border-white bg-[#00B3DB] group-hover:bg-[#0A7396] transition"></span>
                                    <div class="rounded-xl border border-slate-100 bg-white/60 p-4 shadow-sm transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-2xl group-hover:shadow-primary-500/20 group-hover:border-primary-200 group-hover:scale-[1.02] group-hover:bg-white">
                                        <div class="flex gap-4">
                                            @if($experience->thumbnail_path)
                                                <div class="h-16 w-16 shrink-0 overflow-hidden rounded-xl border border-slate-100">
                                                    <img src="{{ $experience->thumbnail_path }}" alt="Logo" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 group-hover:rotate-2">
                                                </div>
                                            @endif
                                            <div class="flex-1 space-y-2">
                                                <div class="flex items-center justify-between gap-3">
                                                    <h3 class="text-xl font-bold text-slate-800">{{ $experience->role }}</h3>
                                                    <span class="text-xs font-semibold text-[#0A7396]">{{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</span>
                                                </div>
                                                <div class="text-sm font-medium text-[#125C78]">{{ $experience->company }}</div>
                                                <p class="text-sm text-slate-600 line-clamp-2">{{ $experience->description }}</p>
                                                    @if($experience->highlights)
                                                        <ul class="mt-2 grid gap-2 text-sm text-slate-600">
                                                            @foreach(array_slice($experience->highlights, 0, 4) as $item)
                                                                <li class="flex items-start gap-2">
                                                                    <span class="mt-1 h-1.5 w-1.5 rounded-full bg-[#15B489]"></span>
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

            <div>
                <h2 class="mb-8 text-2xl font-bold text-[#0A7396] flex items-center gap-3">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#CEF9FF] text-[#0A7396]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 14l9-5-9-5-9 5 9 5z" /><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" /></svg>
                    </span>
                    Education
                </h2>
                <div class="space-y-12 border-l-2 border-slate-100 pl-8 ml-4">
                    @foreach($educations as $education)
                        <div class="relative group">
                            <span class="absolute -left-[41px] top-1 h-5 w-5 rounded-full border-4 border-white bg-[#15B489] group-hover:bg-accent-500 transition-colors duration-300"></span>
                            <div class="rounded-xl border border-slate-100 bg-white p-4 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-accent-500/20 hover:border-accent-200 hover:scale-[1.02]">
                                <div class="flex gap-4 items-start">
                                    @if($education->thumbnail_path)
                                        <div class="h-16 w-16 shrink-0 overflow-hidden rounded-xl border border-slate-100">
                                            <img src="{{ $education->thumbnail_path }}" alt="{{ $education->institution }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 group-hover:rotate-2">
                                        </div>
                                    @endif
                                    <div class="space-y-1">
                                    <h3 class="text-xl font-bold text-slate-800">{{ $education->institution }}</h3>
                                    <div class="text-lg font-medium text-[#125C78]">{{ $education->degree }} {{ $education->major ? 'in ' . $education->major : '' }}</div>
                                    <div class="text-sm text-slate-500">
                                        {{ $education->start_date->format('Y') }} - 
                                        {{ $education->end_date ? $education->end_date->format('Y') : 'Present' }}
                                    </div>
                                    <p class="text-slate-600">{{ $education->description }}</p>
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
