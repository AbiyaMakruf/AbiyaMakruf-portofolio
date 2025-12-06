<x-layouts.main :title="$project->title . ' - Abiya Makruf'">
    <div class="bg-white py-24">
        <div class="mx-auto max-w-4xl px-6">
            <a href="{{ route('projects.index') }}" class="mb-8 inline-flex items-center text-sm font-medium text-slate-500 hover:text-[#00B3DB]">
                &larr; Back to Projects
            </a>

            <div class="mb-8 overflow-hidden rounded-2xl border border-slate-100 shadow-lg">
                @if($project->thumbnail_path)
                    <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" class="w-full object-cover">
                @else
                    <div class="aspect-video w-full bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                @endif
            </div>

            <!-- Gallery -->
            @if($project->images->count() > 0)
                <div class="mb-12 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                    @foreach($project->images as $image)
                        <div class="overflow-hidden rounded-xl border border-slate-100 shadow-sm group relative">
                            <img src="{{ $image->image_path }}" alt="{{ $image->caption ?? 'Gallery Image' }}" class="h-48 w-full object-cover transition hover:scale-105">
                            @if($image->caption)
                                <div class="absolute bottom-0 left-0 right-0 bg-black/60 p-2 text-center text-xs text-white opacity-0 transition group-hover:opacity-100">
                                    {{ $image->caption }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if($project->videos)
                <div class="mb-12 grid gap-4">
                    @foreach($project->videos as $video)
                        <div class="overflow-hidden rounded-xl border border-slate-100 shadow-sm bg-slate-50">
                            <video class="w-full" controls>
                                <source src="{{ $video }}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex flex-wrap items-center gap-4 mb-6">
                <span class="rounded-full bg-[#CEF9FF] px-3 py-1 text-sm font-medium text-[#0A7396]">{{ $project->category }}</span>
                
                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-[#125C78]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        View on GitHub
                    </a>
                @else
                    <span class="text-sm font-medium text-slate-400">GitHub URL is not set</span>
                @endif

                @if($project->website_url)
                    <a href="{{ $project->website_url }}" target="_blank" class="flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-[#125C78]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                        Visit Website
                    </a>
                @else
                    <span class="text-sm font-medium text-slate-400">Website URL is not set</span>
                @endif
            </div>

            <h1 class="mb-6 text-4xl font-bold text-[#125C78]">{{ $project->title }}</h1>

            <div class="prose prose-lg prose-slate max-w-none">
                {!! nl2br(e($project->full_description)) !!}
            </div>

            @if($project->tech_stack)
                <div class="mt-12 border-t border-slate-100 pt-8">
                    <h3 class="mb-4 text-lg font-bold text-slate-800">Tech Stack</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->tech_stack as $tech)
                            <span class="rounded-lg bg-slate-100 px-3 py-1 text-sm font-medium text-slate-600">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.main>
