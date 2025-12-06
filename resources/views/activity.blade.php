<x-layouts.main title="Activity - Abiya Makruf">
    <div class="bg-slate-50 py-24">
        <div class="mx-auto max-w-3xl px-6">
            <h1 class="mb-12 text-4xl font-bold text-[#125C78]">Activity & Updates</h1>

            <div class="space-y-8">
                @forelse($activities as $activity)
                    <article x-data="{
                            open:false,
                            current:0,
                            images: @js($activity->gallery ?? []),
                            show(idx){ this.current = idx; this.open = true; },
                            next(){ if(!this.images.length) return; this.current = (this.current + 1) % this.images.length; },
                            prev(){ if(!this.images.length) return; this.current = (this.current - 1 + this.images.length) % this.images.length; },
                        }"
                        class="rounded-2xl border border-slate-100 bg-white shadow-sm overflow-hidden">
                        @if($activity->thumbnail_path)
                            <div class="bg-slate-50">
                                <img src="{{ $activity->thumbnail_path }}" alt="{{ $activity->title }}" class="h-48 w-full object-contain">
                            </div>
                        @endif
                        <div class="p-8">
                            <div class="mb-4 flex items-center gap-4 text-sm text-slate-500">
                                <time datetime="{{ $activity->published_at }}">{{ $activity->published_at ? $activity->published_at->format('F j, Y') : 'Draft' }}</time>
                                @if($activity->tags)
                                    <div class="flex gap-2 flex-wrap">
                                        @foreach($activity->tags as $tag)
                                            <span class="rounded-full bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">#{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <h2 class="mb-4 text-2xl font-bold text-slate-800">{{ $activity->title }}</h2>
                            <div class="prose prose-slate">
                                {!! nl2br(e($activity->content)) !!}
                            </div>
                            @if($activity->gallery)
                                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                                    @foreach($activity->gallery as $idx => $image)
                                        <button type="button" class="overflow-hidden rounded-xl border border-slate-100 bg-slate-50" @click="show({{ $idx }})">
                                            <img src="{{ $image }}" alt="Gallery image" class="h-36 w-full object-contain">
                                        </button>
                                    @endforeach
                                </div>
                                <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4" @click.self="open=false" @keydown.escape.window="open=false" tabindex="-1">
                                    <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl">
                                        <button type="button" class="absolute top-3 right-3 z-20 text-white bg-black/60 rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-white/70" @click.stop.prevent="open=false">
                                            ✕
                                        </button>
                                        <div class="bg-slate-50 flex items-center justify-center">
                                            <template x-if="images.length">
                                                <img :src="images[current]" class="max-h-[80vh] w-full object-contain">
                                            </template>
                                        </div>
                                        <div class="absolute inset-y-0 left-0 flex items-center z-10">
                                            <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="prev()">‹</button>
                                        </div>
                                        <div class="absolute inset-y-0 right-0 flex items-center z-10">
                                            <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="next()">›</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($activity->videos)
                                <div class="mt-6 grid gap-4">
                                    @foreach($activity->videos as $video)
                                        <video class="w-full rounded-xl border border-slate-100 bg-slate-50" controls>
                                            <source src="{{ $video }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="text-center py-12 text-slate-500">
                        No recent activity.
                    </div>
                @endforelse

                <div class="mt-8">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
