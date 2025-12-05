<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-slate-50 via-white to-primary-50">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="relative z-10 mx-auto max-w-5xl px-6 text-center pt-20">
            <div class="mb-8 inline-flex items-center rounded-full border border-primary-200 bg-white/80 px-4 py-1.5 text-sm font-medium text-primary-700 backdrop-blur-sm shadow-sm">
                <span class="mr-2 flex h-2 w-2 rounded-full bg-primary-500 animate-pulse"></span>
                Available for new projects
            </div>
            <h1 class="mb-8 text-5xl font-bold tracking-tight text-slate-900 md:text-7xl leading-tight">
                Building Digital <br>
                <span class="bg-gradient-to-r from-primary-600 to-sky-400 bg-clip-text text-transparent">Experiences</span>
            </h1>
            <p class="mx-auto mb-12 max-w-2xl text-lg text-slate-600 leading-relaxed">
                {{ \App\Models\SiteSetting::where('key', 'tagline')->value('value') ?? "I'm Abiya Makruf, a Full Stack Engineer specializing in Laravel, Cloud Architecture, and AI Integration." }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#about" class="inline-flex items-center justify-center rounded-xl bg-primary-600 px-8 py-3.5 font-semibold text-white shadow-lg shadow-primary-600/20 transition-all hover:-translate-y-1 hover:bg-primary-700 hover:shadow-primary-600/30">
                    About Me
                </a>
                <button onclick="document.getElementById('ai-widget').scrollIntoView({behavior: 'smooth'})" class="group inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-8 py-3.5 font-semibold text-slate-700 shadow-sm transition-all hover:border-primary-200 hover:text-primary-600 hover:shadow-md">
                    <svg class="h-5 w-5 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    Ask Gemini
                </button>
            </div>
        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="relative bg-white py-24">
        <div class="mx-auto max-w-6xl px-6">
            <div class="grid gap-12 md:grid-cols-3 items-start">
                <div class="flex justify-center md:justify-start">
                    @php
                        $aboutPhoto = \App\Models\SiteSetting::where('key','about_photo_url')->value('value');
                    @endphp
                    <div class="relative h-64 w-64 overflow-hidden rounded-2xl border-4 border-white shadow-2xl bg-slate-100 rotate-3 hover:rotate-0 transition-transform duration-500">
                        @if($aboutPhoto)
                            <img src="{{ $aboutPhoto }}" alt="Profile photo" class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-slate-100 text-slate-400">No Photo</div>
                        @endif
                    </div>
                </div>
                <div class="md:col-span-2 space-y-6">
                    @php
                        $aboutName = \App\Models\SiteSetting::where('key','about_name')->value('value') ?? 'Abiya Makruf';
                        $aboutDesc = \App\Models\SiteSetting::where('key','about_description')->value('value') ?? 'Full Stack Engineer focused on Laravel, Cloud, and AI.';
                        $contactEmail = \App\Models\SiteSetting::where('key','contact_email')->value('value');
                        $contactEmailUni = \App\Models\SiteSetting::where('key','contact_email_university')->value('value');
                        $contactPhone = \App\Models\SiteSetting::where('key','contact_phone')->value('value');
                        $contactLocation = \App\Models\SiteSetting::where('key','contact_location')->value('value');
                    @endphp
                    <div class="flex items-center gap-3">
                        <span class="rounded-full bg-primary-50 px-3 py-1 text-xs font-semibold text-primary-600 border border-primary-100">About</span>
                        <span class="text-sm text-slate-500 font-medium">{{ $contactLocation ?? 'Based in Indonesia' }}</span>
                    </div>
                    <h2 class="text-4xl font-bold text-slate-900">{{ $aboutName }}</h2>
                    <div class="prose prose-slate text-slate-600 leading-relaxed">
                        <p>{{ $aboutDesc }}</p>
                    </div>
                    
                    <div class="grid gap-3 text-sm text-slate-600 pt-4 border-t border-slate-100">
                        @if($contactEmail)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <a href="mailto:{{ $contactEmail }}" class="text-slate-700 hover:text-primary-600 font-medium transition-colors">{{ $contactEmail }}</a>
                            </div>
                        @endif
                        @if($contactEmailUni)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                <a href="mailto:{{ $contactEmailUni }}" class="text-slate-700 hover:text-primary-600 font-medium transition-colors">{{ $contactEmailUni }}</a>
                            </div>
                        @endif
                    </div>

                    @php
                        $socials = \App\Models\SocialLink::allSafe();
                    @endphp
                    @if($socials->isNotEmpty())
                        <div class="flex flex-wrap items-center gap-3 pt-4">
                            @foreach($socials as $social)
                                <a href="{{ $social->url }}" target="_blank" class="group flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 shadow-sm transition-all hover:-translate-y-1 hover:border-primary-200 hover:text-primary-600 hover:shadow-md">
                                    @if($social->icon_path)
                                        <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-5 w-5 object-contain opacity-70 group-hover:opacity-100 transition-opacity">
                                    @elseif($social->icon_class)
                                        <span class="{{ $social->icon_class }} text-xl"></span>
                                    @else
                                        <span class="text-xs font-bold">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
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
    <section class="py-24 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">Portfolio</span>
                    <h2 class="text-3xl font-bold text-slate-900 mt-2">Latest Projects</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-primary-600 transition-colors">
                    View All Projects 
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                @forelse($latestProjects as $project)
                    <div class="group relative flex flex-col overflow-hidden rounded-2xl bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-slate-100">
                        <div class="aspect-video w-full bg-slate-100 overflow-hidden relative">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                            @else
                                <div class="flex h-full items-center justify-center text-slate-400 bg-slate-50">
                                    <svg class="w-12 h-12 opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-3 flex items-center gap-2">
                                <span class="inline-flex items-center rounded-md bg-primary-50 px-2 py-1 text-xs font-medium text-primary-700 ring-1 ring-inset ring-primary-700/10">{{ $project->category }}</span>
                            </div>
                            <h3 class="mb-2 text-xl font-bold text-slate-900 group-hover:text-primary-600 transition-colors">{{ $project->title }}</h3>
                            <p class="text-slate-600 text-sm line-clamp-2 mb-4 flex-grow">{{ $project->short_description }}</p>
                            <div class="flex items-center text-primary-600 text-sm font-medium mt-auto">
                                Read Case Study
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </div>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0 z-10"></a>
                    </div>
                @empty
                    <div class="col-span-3 flex flex-col items-center justify-center py-16 text-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50">
                        <svg class="w-12 h-12 text-slate-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        <h3 class="text-lg font-medium text-slate-900">No projects yet</h3>
                        <p class="text-slate-500 mt-1">Check back soon for updates.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-12 text-center md:hidden">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 transition-colors">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    <!-- AI Widget Section -->
    <section id="ai-widget" class="py-24 bg-white relative overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-100 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-sky-100 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="mx-auto max-w-3xl px-6 relative z-10">
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl ring-1 ring-slate-900/5"
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
                <div class="bg-slate-900 p-8 text-white relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-600 to-sky-500 opacity-20"></div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold flex items-center gap-3">
                            <div class="p-2 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg class="h-6 w-6 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                            </div>
                            Ask Gemini about Abiya
                        </h3>
                        <p class="text-slate-300 text-sm mt-2 ml-1">Powered by Google Gemini & my CV context</p>
                    </div>
                </div>
                <div class="p-6 md:p-8">
                    <div class="mb-6 min-h-[120px] rounded-xl bg-slate-50 p-6 text-slate-700 border border-slate-100 shadow-inner">
                        <template x-if="loading">
                            <div class="flex items-center gap-3 text-slate-500 h-full justify-center py-8">
                                <svg class="h-6 w-6 animate-spin text-primary-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4A8 8 0 004 12z"></path>
                                </svg>
                                <span class="font-medium">Gemini is thinking...</span>
                            </div>
                        </template>

                        <div x-show="!loading && (answer || error)" x-transition>
                            <p class="text-red-600 font-semibold" x-show="error" x-text="error"></p>
                            <div class="prose prose-sm prose-slate max-w-none" x-show="!error && answer" x-html="marked.parse(answer)"></div>
                        </div>
                        
                        <div x-show="!loading && !answer && !error" class="flex flex-col items-center justify-center h-full py-8 text-slate-400 text-center">
                            <svg class="w-8 h-8 mb-2 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                            <p>Ask me anything about my experience, skills, or projects.</p>
                        </div>
                    </div>

                    <form class="flex gap-3" @submit.prevent="ask()">
                        <input x-ref="input" type="text" x-model="question" placeholder="e.g., What is his experience with Laravel?" class="w-full rounded-xl border-slate-200 bg-white px-4 py-3.5 focus:border-primary-500 focus:ring-primary-500 outline-none transition shadow-sm text-slate-700 placeholder:text-slate-400">
                        <button type="submit" :disabled="loading || !question.trim()" class="rounded-xl bg-primary-600 px-6 font-bold text-white transition hover:bg-primary-700 disabled:opacity-50 disabled:cursor-not-allowed min-w-[100px] flex items-center justify-center gap-2 shadow-md shadow-primary-600/20">
                            <span x-show="!loading">Ask</span>
                            <span x-show="loading" class="flex items-center gap-2">
                                <svg class="h-4 w-4 animate-spin text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4A8 8 0 004 12z"></path>
                                </svg>
                            </span>
                        </button>
                    </form>

                    <!-- Default Questions -->
                    <div class="mt-6">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Suggested Questions</p>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" @click="setExample('Tell me about your experience')" class="px-3 py-2 text-xs font-medium bg-slate-50 hover:bg-white hover:shadow-sm hover:text-primary-600 border border-slate-100 text-slate-600 rounded-lg transition-all">
                                Tell me about your experience
                            </button>
                            <button type="button" @click="setExample('What are your technical skills?')" class="px-3 py-2 text-xs font-medium bg-slate-50 hover:bg-white hover:shadow-sm hover:text-primary-600 border border-slate-100 text-slate-600 rounded-lg transition-all">
                                What are your technical skills?
                            </button>
                            <button type="button" @click="setExample('How can I contact you?')" class="px-3 py-2 text-xs font-medium bg-slate-50 hover:bg-white hover:shadow-sm hover:text-primary-600 border border-slate-100 text-slate-600 rounded-lg transition-all">
                                How can I contact you?
                            </button>
                            <button type="button" @click="setExample('What projects have you worked on?')" class="px-3 py-2 text-xs font-medium bg-slate-50 hover:bg-white hover:shadow-sm hover:text-primary-600 border border-slate-100 text-slate-600 rounded-lg transition-all">
                                What projects have you worked on?
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
