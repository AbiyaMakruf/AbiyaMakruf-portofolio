@php use Illuminate\Support\Str; @endphp
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

            <div class="flex flex-col gap-3 md:flex-row md:items-center md:flex-wrap mb-6">
                <span class="rounded-full bg-[#CEF9FF] px-3 py-1 text-sm font-medium text-[#0A7396] w-fit">{{ $project->category }}</span>
                
                <div class="flex flex-wrap items-center gap-3">
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-[#00B3DB] hover:text-[#00B3DB] hover:-translate-y-0.5 transition shadow-sm">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.6.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.108-.775.418-1.305.763-1.604-2.666-.305-5.468-1.334-5.468-5.931 0-1.31.469-2.381 1.236-3.221-.125-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23a11.52 11.52 0 012.994-.404c1.018.005 2.046.137 3.005.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.607-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .318.193.692.8.576C20.565 21.796 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                            View on GitHub
                        </a>
                    @else
                        <span class="text-sm font-medium text-slate-400">GitHub URL is not set</span>
                    @endif

                    @if($project->website_url)
                        <a href="{{ $project->website_url }}" target="_blank" class="inline-flex items-center gap-2 rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-[#00B3DB] hover:text-[#00B3DB] hover:-translate-y-0.5 transition shadow-sm">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                            Visit Website
                        </a>
                    @else
                        <span class="text-sm font-medium text-slate-400">Website URL is not set</span>
                    @endif
                </div>
            </div>

            <h1 class="mb-6 text-4xl font-bold text-[#125C78]">{{ $project->title }}</h1>

            <div class="prose prose-lg prose-slate max-w-none prose-ul:pl-6 prose-ol:pl-6 prose-li:marker:text-[#0A7396] prose-li:leading-relaxed prose-h1:text-4xl prose-h1:font-bold prose-h2:text-3xl prose-h2:font-bold prose-h3:text-2xl prose-h3:font-semibold prose-h4:text-xl prose-h4:font-semibold prose-blockquote:border-l-4 prose-blockquote:border-[#0A7396]/40 prose-blockquote:text-slate-700">
                {!! Str::markdown($project->full_description) !!}
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

            <!-- Gallery -->
            @if($project->images->count() > 0)
                <div 
                    x-data="{
                        open:false,
                        current:0,
                        images: @js($project->images->pluck('image_path')),
                        captions: @js($project->images->pluck('caption')),
                        show(idx){ this.current = idx; this.open = true; },
                        next(){ if(!this.images.length) return; this.current = (this.current + 1) % this.images.length; },
                        prev(){ if(!this.images.length) return; this.current = (this.current - 1 + this.images.length) % this.images.length; },
                    }"
                    class="mt-12"
                >
                    <h3 class="mb-4 text-lg font-bold text-slate-800">Gallery</h3>
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                        @foreach($project->images as $idx => $image)
                            <button type="button" class="overflow-hidden rounded-xl border border-slate-100 shadow-sm group relative bg-slate-50" @click="show({{ $idx }})">
                                <img src="{{ $image->image_path }}" alt="{{ $image->caption ?? 'Gallery Image' }}" class="h-36 w-full object-cover transition hover:scale-105">
                                @if($image->caption)
                                    <div class="absolute bottom-0 left-0 right-0 bg-black/60 p-2 text-center text-xs text-white opacity-0 transition group-hover:opacity-100">
                                        {{ $image->caption }}
                                    </div>
                                @endif
                            </button>
                        @endforeach
                    </div>
                    <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4" @click.self="open=false" @keydown.escape.window="open=false" tabindex="-1">
                        <div class="relative max-w-5xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl">
                            <button type="button" class="absolute top-3 right-3 z-20 text-white bg-black/60 rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-white/70" @click.stop.prevent="open=false">
                                ✕
                            </button>
                            <div class="bg-slate-50 flex items-center justify-center">
                                <template x-if="images.length">
                                    <img :src="images[current]" class="max-h-[80vh] w-full object-contain">
                                </template>
                            </div>
                            <template x-if="captions[current]">
                                <div class="px-4 py-2 text-sm text-center text-slate-600 bg-white border-t border-slate-100" x-text="captions[current]"></div>
                            </template>
                            <div class="absolute inset-y-0 left-0 flex items-center z-10">
                                <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="prev()">‹</button>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center z-10">
                                <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="next()">›</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($project->videos)
                <div class="mt-12">
                    <h3 class="mb-4 text-lg font-bold text-slate-800">Videos</h3>
                    <div class="grid gap-4">
                        @foreach($project->videos as $video)
                            <div class="overflow-hidden rounded-xl border border-slate-100 shadow-sm bg-slate-50">
                                <video class="w-full" controls preload="metadata" muted autoplay loop playsinline>
                                    <source src="{{ $video }}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layouts.main>
