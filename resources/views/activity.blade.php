<x-layouts.main title="Activity - Abiya Makruf">
    <div class="bg-slate-50 py-24">
        <div class="mx-auto max-w-3xl px-6">
            <h1 class="mb-12 text-4xl font-bold text-[#125C78]">Activity & Updates</h1>

            <div class="space-y-8">
                @forelse($activities as $activity)
                    <article class="rounded-2xl border border-slate-100 bg-white shadow-sm overflow-hidden">
                        @if($activity->thumbnail_path)
                            <img src="{{ $activity->thumbnail_path }}" alt="{{ $activity->title }}" class="h-48 w-full object-cover">
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
                                    @foreach($activity->gallery as $image)
                                        <div class="overflow-hidden rounded-xl border border-slate-100">
                                            <img src="{{ $image }}" alt="Gallery image" class="h-36 w-full object-cover">
                                        </div>
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
