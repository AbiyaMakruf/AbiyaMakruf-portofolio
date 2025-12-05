<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-[#CEF9FF] via-white to-[#D2F9E7]">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="relative z-10 mx-auto max-w-5xl px-6 text-center">
            <div class="mb-6 inline-flex items-center rounded-full border border-[#00B3DB]/30 bg-white/50 px-3 py-1 text-sm text-[#0A7396] backdrop-blur-sm">
                <span class="mr-2 flex h-2 w-2 rounded-full bg-[#00B3DB]"></span>
                Available for new projects
            </div>
            <h1 class="mb-6 text-5xl font-bold tracking-tight text-[#125C78] md:text-7xl">
                Building Digital <br>
                <span class="bg-gradient-to-r from-[#00B3DB] to-[#15B489] bg-clip-text text-transparent">Experiences</span>
            </h1>
            <p class="mx-auto mb-10 max-w-2xl text-lg text-slate-600">
                {{ \App\Models\SiteSetting::where('key', 'tagline')->value('value') ?? "I'm Abiya Makruf, a Full Stack Engineer specializing in Laravel, Cloud Architecture, and AI Integration." }}
            </p>
            <div class="flex justify-center gap-4">
                <a href="#about" class="rounded-xl bg-[#125C78] px-8 py-3 font-semibold text-white shadow-xl shadow-[#125C78]/20 transition hover:-translate-y-1 hover:bg-[#0A7396]">
                    About Me
                </a>
                <button onclick="document.getElementById('ai-widget').scrollIntoView({behavior: 'smooth'})" class="group flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-8 py-3 font-semibold text-slate-700 shadow-sm transition hover:border-[#00B3DB] hover:text-[#00B3DB]">
                    <img src="/gemini-color.svg" alt="Gemini" class="h-5 w-5">
                    Ask Gemini
                </button>
            </div>
        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="relative bg-white py-16">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-10 md:grid-cols-3 items-center">
                <div class="flex justify-center">
                    @php
                        $aboutPhoto = \App\Models\SiteSetting::where('key','about_photo_url')->value('value');
                    @endphp
                    <div class="relative h-52 w-52 overflow-hidden rounded-2xl border border-slate-100 shadow-lg bg-white">
                        @if($aboutPhoto)
                            <img src="{{ $aboutPhoto }}" alt="Profile photo" class="h-full w-full object-contain">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-slate-100 text-slate-400">No Photo</div>
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2 space-y-4">
                    @php
                        $aboutName = \App\Models\SiteSetting::where('key','about_name')->value('value') ?? 'Abiya Makruf';
                        $aboutDesc = \App\Models\SiteSetting::where('key','about_description')->value('value') ?? 'Full Stack Engineer focused on Laravel, Cloud, and AI.';
                        $contactEmail = \App\Models\SiteSetting::where('key','contact_email')->value('value');
                        $contactEmailUni = \App\Models\SiteSetting::where('key','contact_email_university')->value('value');
                        $contactPhone = \App\Models\SiteSetting::where('key','contact_phone')->value('value');
                        $contactLocation = \App\Models\SiteSetting::where('key','contact_location')->value('value');
                    @endphp
                    <div class="flex items-center gap-3">
                        <span class="rounded-full bg-[#CEF9FF] px-3 py-1 text-xs font-semibold text-[#0A7396]">About</span>
                        <span class="text-sm text-slate-500">{{ $contactLocation ?? 'Based in Indonesia' }}</span>
                    </div>
                    <h2 class="text-3xl font-bold text-[#125C78]">{{ $aboutName }}</h2>
                    <p class="text-slate-600 leading-relaxed">{{ $aboutDesc }}</p>
                    <div class="grid gap-2 text-sm text-slate-600">
                        @if($contactEmail)<div>Email: <a href="mailto:{{ $contactEmail }}" class="text-[#00B3DB] hover:underline">{{ $contactEmail }}</a></div>@endif
                        @if($contactEmailUni)<div>Campus Email: <a href="mailto:{{ $contactEmailUni }}" class="text-[#00B3DB] hover:underline">{{ $contactEmailUni }}</a></div>@endif
                        @if($contactPhone)<div>Phone: <a href="tel:{{ $contactPhone }}" class="text-[#00B3DB] hover:underline">{{ $contactPhone }}</a></div>@endif
                        @if($contactLocation)<div>Location: {{ $contactLocation }}</div>@endif
                    </div>
                    @php
                        $socials = \App\Models\SocialLink::allSafe();
                    @endphp
                    @if($socials->isNotEmpty())
                        <div class="flex flex-wrap items-center gap-3 pt-3">
                            @foreach($socials as $social)
                                <a href="{{ $social->url }}" target="_blank" class="group flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm hover:-translate-y-0.5 hover:border-[#00B3DB] hover:shadow-md transition">
                                    @if($social->icon_path)
                                        <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-6 w-6 object-contain">
                                    @elseif($social->icon_class)
                                        <span class="{{ $social->icon_class }} text-xl text-slate-600 group-hover:text-[#00B3DB]"></span>
                                    @else
                                        <span class="text-sm font-semibold text-slate-600 group-hover:text-[#00B3DB]">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects Preview -->
    <section class="py-24 bg-white">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-bold text-[#125C78]">Latest Projects</h2>
                <a href="{{ route('projects.index') }}" class="text-[#00B3DB] font-semibold hover:underline">View All &rarr;</a>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                @forelse($latestProjects as $project)
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-lg transition hover:-translate-y-1 hover:shadow-xl">
                        <div class="aspect-video w-full bg-slate-100 overflow-hidden">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full items-center justify-center text-slate-400">No Image</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="mb-2 flex items-center gap-2">
                                <span class="rounded-full bg-[#CEF9FF] px-2 py-1 text-xs font-medium text-[#0A7396]">{{ $project->category }}</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-slate-800">{{ $project->title }}</h3>
                            <p class="text-slate-600 line-clamp-2">{{ $project->short_description }}</p>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0"></a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">
                        No projects published yet.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- AI Widget Section -->
    <section id="ai-widget" class="py-24 bg-slate-50">
        <div class="mx-auto max-w-3xl px-6">
            <div class="overflow-hidden rounded-2xl border border-white/20 bg-white shadow-2xl"
                x-data="{
                    question: '',
                    answer: '',
                    error: '',
                    loading: false,
                    init() {
                        if (window.marked) {
                            marked.setOptions({ breaks: true });
                        }
                    },
                    async ask() {
                        const prompt = this.question.trim();
                        if (!prompt || this.loading) return;

                        this.question = prompt;
                        this.loading = true;
                        this.answer = '';
                        this.error = '';

                        try {
                            const response = await fetch('{{ route('ai.ask') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ question: prompt })
                            });

                            const data = await response.json();
                            const text = data?.candidates?.[0]?.content?.parts?.[0]?.text ?? '';

                            if (text) {
                                this.answer = text;
                            } else if (data?.error?.message) {
                                this.error = data.error.message;
                            } else {
                                this.error = 'I could not find an answer to that.';
                            }
                        } catch (err) {
                            this.error = 'Sorry, something went wrong. Please try again.';
                        } finally {
                            this.loading = false;
                        }
                    },
                    setExample(text) {
                        this.question = text;
                        this.$nextTick(() => this.$refs.input?.focus());
                    }
                }">
                <div class="bg-gradient-to-r from-[#125C78] to-[#0A7396] p-6 text-white">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                        Ask Gemini about Abiya
                    </h3>
                    <p class="text-blue-100 text-sm mt-1">Powered by Google Gemini & my CV</p>
                </div>
                <div class="p-6">
                    <div class="mb-6 min-h-[120px] rounded-xl bg-slate-50 p-4 text-slate-700 border border-slate-100">
                        <template x-if="loading">
                            <div class="flex items-center gap-3 text-slate-500">
                                <svg class="h-5 w-5 animate-spin text-[#00B3DB]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4A8 8 0 004 12z"></path>
                                </svg>
                                <span>Gemini is thinking...</span>
                            </div>
                        </template>

                        <div x-show="!loading && (answer || error)" x-transition>
                            <p class="text-red-600 font-semibold" x-show="error" x-text="error"></p>
                            <div class="prose prose-sm max-w-none" x-show="!error && answer" x-html="marked.parse(answer)"></div>
                        </div>
                    </div>

                    <form class="flex gap-2" @submit.prevent="ask()">
                        <input x-ref="input" type="text" x-model="question" placeholder="e.g., What is his experience with Laravel?" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-[#00B3DB] focus:ring-[#00B3DB] outline-none transition">
                        <button type="submit" :disabled="loading || !question.trim()" class="rounded-xl bg-[#00B3DB] px-6 font-bold text-white transition hover:bg-[#0A7396] disabled:opacity-50 disabled:cursor-not-allowed min-w-[120px] flex items-center justify-center gap-2">
                            <span x-show="!loading">Ask</span>
                            <span x-show="loading" class="flex items-center gap-2">
                                <svg class="h-4 w-4 animate-spin text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4A8 8 0 004 12z"></path>
                                </svg>
                                <span>Loading</span>
                            </span>
                        </button>
                    </form>

                    <!-- Default Questions -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <button type="button" @click="setExample('Tell me about your experience')" class="px-3 py-1.5 text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg transition">
                            Tell me about your experience
                        </button>
                        <button type="button" @click="setExample('What are your technical skills?')" class="px-3 py-1.5 text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg transition">
                            What are your technical skills?
                        </button>
                        <button type="button" @click="setExample('How can I contact you?')" class="px-3 py-1.5 text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg transition">
                            How can I contact you?
                        </button>
                        <button type="button" @click="setExample('What projects have you worked on?')" class="px-3 py-1.5 text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg transition">
                            What projects have you worked on?
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
