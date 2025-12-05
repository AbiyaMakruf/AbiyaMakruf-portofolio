<x-layouts.main :title="'Career - ' . $experience->role">
    <section class="bg-white py-16">
        <div class="mx-auto max-w-5xl px-6">
            <div class="mb-8 flex flex-wrap items-center gap-4">
                <a href="{{ route('career') }}" class="text-sm text-[#125C78] hover:underline">&larr; Back to career</a>
                <span class="rounded-full bg-[#CEF9FF] px-3 py-1 text-xs font-semibold text-[#0A7396]">{{ $experience->category ?? 'Professional' }}</span>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white shadow-xl">
                @if($experience->thumbnail_path)
                    <div class="border-b border-slate-100 bg-slate-50/60 p-4 flex items-center gap-3">
                        <div class="h-16 w-16 overflow-hidden rounded-xl border border-slate-100">
                            <img src="{{ $experience->thumbnail_path }}" alt="Logo" class="h-full w-full object-cover">
                        </div>
                        <div class="text-sm text-slate-600">
                            <div class="font-semibold text-[#125C78]">{{ $experience->company }}</div>
                            <div>{{ $experience->start_date?->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</div>
                        </div>
                    </div>
                @endif

                @if($experience->gallery && count($experience->gallery))
                    <div class="grid gap-3 p-4 sm:grid-cols-2">
                        @foreach($experience->gallery as $image)
                            <div class="overflow-hidden rounded-xl border border-slate-100">
                                <img src="{{ $image }}" alt="{{ $experience->role }} image" class="h-56 w-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="p-8 space-y-6">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div>
                            <h1 class="text-3xl font-bold text-[#125C78]">{{ $experience->role }}</h1>
                            <p class="text-lg text-slate-700">{{ $experience->company }}</p>
                            <p class="text-sm text-slate-500">
                                {{ $experience->start_date?->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                @if($experience->location)
                                    &bull; {{ $experience->location }}
                                @endif
                            </p>
                        </div>
                    </div>

                    @if($experience->description)
                        <p class="text-slate-700 leading-relaxed">{{ $experience->description }}</p>
                    @endif

                    @if($experience->highlights)
                        <div class="rounded-xl border border-slate-100 bg-slate-50/50 p-5">
                            <h3 class="mb-3 text-lg font-semibold text-[#0A7396]">Highlights</h3>
                            <ul class="grid gap-2 text-slate-700">
                                @foreach($experience->highlights as $item)
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1 h-2 w-2 rounded-full bg-[#15B489]"></span>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
