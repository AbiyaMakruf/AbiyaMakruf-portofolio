@php use Illuminate\Support\Str; @endphp
<x-layouts.main title="Skill & Achievement - Abiya Makruf">
    <section class="bg-slate-50 py-20">
        <div class="mx-auto max-w-7xl px-6 space-y-14">
            <div class="text-center space-y-3">
                <p class="text-xs uppercase tracking-[0.3em] text-[#00B3DB]">Profile Highlights</p>
                <h1 class="text-4xl font-bold text-[#125C78]">Skill & Achievement</h1>
                <p class="text-slate-600">Stacks I use, milestones I reached, and publications I’ve shared.</p>
            </div>

            <!-- Skills by category -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($skills as $category => $categorySkills)
                    <div class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary-500/20 hover:border-primary-200 hover:scale-[1.02]">
                        <h3 class="mb-4 text-xl font-bold text-[#0A7396] transition-colors duration-300 group-hover:text-primary-500">{{ $category }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categorySkills as $skill)
                                <div class="flex items-center gap-2 rounded-lg bg-slate-50 px-3 py-2 text-sm font-medium text-slate-700 border border-slate-100">
                                    @if($skill->icon_path)
                                        <img src="{{ $skill->icon_path }}" class="h-5 w-5" alt="">
                                    @endif
                                    {{ $skill->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Achievements -->
            <div class="space-y-4" x-data="{ open: null }">
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-[#15B489]"></span>
                    <h2 class="text-2xl font-bold text-[#125C78]">Achievements</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    @forelse($achievements as $achievement)
                        <article class="group rounded-2xl border border-slate-100 bg-white shadow-sm overflow-hidden cursor-pointer transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary-500/20 hover:border-primary-200 hover:scale-[1.02]" @click="open === {{ $achievement->id }} ? open = null : open = {{ $achievement->id }}">
                            @if($achievement->image_path)
                                <img src="{{ $achievement->image_path }}" alt="{{ $achievement->title }}" class="h-40 w-full object-contain bg-slate-50 transition-transform duration-700 ease-out group-hover:scale-110">
                            @endif
                            <div class="p-6 space-y-3">
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="font-semibold text-[#0A7396]">{{ $achievement->date?->format('d M Y') ?? 'No date' }}</span>
                                    @if($achievement->certificate_url)
                                        <a href="{{ $achievement->certificate_url }}" target="_blank" class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-[#0A7396] shadow-sm transition hover:-translate-y-0.5 hover:border-[#00B3DB] hover:text-[#00B3DB]">
                                            View Certificate →
                                        </a>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-slate-800">{{ $achievement->title }}</h3>
                                <p class="text-sm text-slate-600">{{ Str::limit($achievement->description, 180) }}</p>
                                <span class="text-sm font-semibold text-[#00B3DB]">Read more →</span>
                            </div>
                        </article>
                        <!-- Modal -->
                        <div x-show="open === {{ $achievement->id }}" x-transition class="fixed inset-0 z-50 flex items-start justify-center bg-black/60 p-4 overflow-y-auto overscroll-contain" @click.self="open = null" @keydown.escape.window="open = null">
                            <div class="max-w-3xl w-full max-h-[90vh] overflow-y-auto overflow-x-hidden rounded-2xl bg-white shadow-2xl" @wheel.stop x-data="{ viewerOpen:false, viewerCurrent:0, viewerItems:@js($achievement->gallery ?? []) }">
                                <div class="flex justify-between items-center px-4 py-3 border-b border-slate-100">
                                    <div>
                                        <h3 class="text-xl font-bold text-slate-800">{{ $achievement->title }}</h3>
                                    </div>
                                    <button class="text-slate-400 hover:text-slate-600" @click="open = null">✕</button>
                                </div>
                                <div class="p-6 space-y-4">
                                    @if($achievement->image_path)
                                        <div class="overflow-hidden rounded-xl border border-slate-100 bg-slate-50">
                                            <img src="{{ $achievement->image_path }}" alt="{{ $achievement->title }}" class="w-full object-contain max-h-72 mx-auto">
                                        </div>
                                    @endif
                                    <p class="text-xs text-slate-500">{{ $achievement->date?->format('d M Y') ?? 'No date' }}</p>
                                    @if($achievement->certificate_url)
                                        <a href="{{ $achievement->certificate_url }}" target="_blank" class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-[#0A7396] shadow-sm transition hover:-translate-y-0.5 hover:border-[#00B3DB] hover:text-[#00B3DB]">
                                            View Certificate
                                            <span aria-hidden="true">↗</span>
                                        </a>
                                    @endif
                                    <p class="text-slate-700 leading-relaxed">{{ $achievement->description }}</p>
                                    @if($achievement->gallery)
                                        <div class="grid gap-3 grid-cols-2 sm:grid-cols-3">
                                            @foreach($achievement->gallery as $idx => $image)
                                                <button type="button" class="w-full rounded-lg border border-slate-100 bg-slate-50 overflow-hidden" @click="viewerCurrent={{ $idx }}; viewerOpen=true">
                                                    <img src="{{ $image }}" class="w-full object-cover h-28" alt="Gallery">
                                                </button>
                                            @endforeach
                                        </div>
                                        <div x-show="viewerOpen" x-transition class="fixed inset-0 z-60 flex items-center justify-center bg-black/70 p-4" @click.self="viewerOpen=false">
                                            <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl">
                                                <div class="bg-slate-50 flex items-center justify-center">
                                                    <template x-if="viewerItems.length">
                                                        <img :src="viewerItems[viewerCurrent]" class="max-h-[80vh] w-full object-contain">
                                                    </template>
                                                </div>
                                                <div class="absolute inset-y-0 left-0 flex items-center z-10">
                                                    <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="viewerCurrent = (viewerCurrent - 1 + viewerItems.length) % viewerItems.length">‹</button>
                                                </div>
                                                <div class="absolute inset-y-0 right-0 flex items-center z-10">
                                                    <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="viewerCurrent = (viewerCurrent + 1) % viewerItems.length">›</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-slate-500">No achievements yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Publications -->
            <div class="space-y-4" x-data="{ openPub: null }">
                <div class="flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-[#00B3DB]"></span>
                    <h2 class="text-2xl font-bold text-[#125C78]">Publications</h2>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    @forelse($publications as $pub)
                        <article class="group rounded-2xl border border-slate-100 bg-white shadow-sm overflow-hidden cursor-pointer transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary-500/20 hover:border-primary-200 hover:scale-[1.02]" @click="openPub === {{ $pub->id }} ? openPub = null : openPub = {{ $pub->id }}">
                            @if($pub->certificate_image_path)
                                <img src="{{ $pub->certificate_image_path }}" alt="{{ $pub->title }}" class="h-40 w-full object-contain bg-slate-50 transition-transform duration-700 ease-out group-hover:scale-110">
                            @endif
                            <div class="p-6 space-y-3">
                                <div class="flex items-center gap-3 text-xs text-slate-500">
                                    <span class="font-semibold text-[#0A7396]">{{ $pub->published_at?->format('d M Y') ?? 'No date' }}</span>
                                    @if($pub->doi_url)
                                        <a href="{{ $pub->doi_url }}" target="_blank" class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1 text-[11px] font-semibold text-[#0A7396] shadow-sm transition hover:-translate-y-0.5 hover:border-[#00B3DB] hover:text-[#00B3DB]">
                                            View Paper →
                                        </a>
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-slate-800">{{ $pub->title }}</h3>
                                <p class="text-sm text-slate-600">{{ Str::limit($pub->description, 180) }}</p>
                                <span class="text-sm font-semibold text-[#00B3DB]">Read more →</span>
                            </div>
                        </article>
                        <div x-show="openPub === {{ $pub->id }}" x-transition class="fixed inset-0 z-50 flex items-start justify-center bg-black/60 p-4 overflow-y-auto overscroll-contain" @click.self="openPub = null" @keydown.escape.window="openPub = null">
                            <div class="max-w-3xl w-full max-h-[90vh] overflow-y-auto overflow-x-hidden rounded-2xl bg-white shadow-2xl" @wheel.stop x-data="{ viewerOpen:false, viewerCurrent:0, viewerItems:@js($pub->gallery ?? []) }">
                                <div class="flex justify-between items-center px-4 py-3 border-b border-slate-100">
                                    <div>
                                        <h3 class="text-xl font-bold text-slate-800">{{ $pub->title }}</h3>
                                    </div>
                                    <button class="text-slate-400 hover:text-slate-600" @click="openPub = null">✕</button>
                                </div>
                                <div class="p-6 space-y-4">
                                    @if($pub->certificate_image_path)
                                        <div class="overflow-hidden rounded-xl border border-slate-100 bg-slate-50">
                                            <img src="{{ $pub->certificate_image_path }}" alt="{{ $pub->title }}" class="w-full object-contain max-h-72 mx-auto">
                                        </div>
                                    @endif
                                    <p class="text-xs text-slate-500">{{ $pub->published_at?->format('d M Y') ?? 'No date' }}</p>
                                    @if($pub->doi_url)
                                        <a href="{{ $pub->doi_url }}" target="_blank" class="inline-flex w-fit items-center gap-2 rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-[#0A7396] shadow-sm transition hover:-translate-y-0.5 hover:border-[#00B3DB] hover:text-[#00B3DB]">
                                            View Paper
                                            <span aria-hidden="true">↗</span>
                                        </a>
                                    @endif
                                    <p class="text-slate-700 leading-relaxed">{{ $pub->description }}</p>
                                    @if($pub->gallery)
                                        <div class="grid gap-3 grid-cols-2 sm:grid-cols-3">
                                            @foreach($pub->gallery as $idx => $image)
                                                <button type="button" class="w-full rounded-lg border border-slate-100 bg-slate-50 overflow-hidden" @click="viewerCurrent={{ $idx }}; viewerOpen=true">
                                                    <img src="{{ $image }}" class="w-full object-cover h-28" alt="Gallery">
                                                </button>
                                            @endforeach
                                        </div>
                                        <div x-show="viewerOpen" x-transition class="fixed inset-0 z-60 flex items-center justify-center bg-black/70 p-4" @click.self="viewerOpen=false">
                                            <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl">
                                                <div class="bg-slate-50 flex items-center justify-center">
                                                    <template x-if="viewerItems.length">
                                                        <img :src="viewerItems[viewerCurrent]" class="max-h-[80vh] w-full object-contain">
                                                    </template>
                                                </div>
                                                <div class="absolute inset-y-0 left-0 flex items-center z-10">
                                                    <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="viewerCurrent = (viewerCurrent - 1 + viewerItems.length) % viewerItems.length">‹</button>
                                                </div>
                                                <div class="absolute inset-y-0 right-0 flex items-center z-10">
                                                    <button type="button" class="m-2 rounded-full bg-black/50 text-white p-2" @click.stop="viewerCurrent = (viewerCurrent + 1) % viewerItems.length">›</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-slate-500">No publications yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
