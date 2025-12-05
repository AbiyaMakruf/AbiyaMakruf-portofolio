<x-layouts.main>
    <!-- Hero Section - Enhanced with modern design -->
    <section class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 h-80 w-80 rounded-full bg-gradient-to-br from-sky-200/40 to-emerald-200/40 blur-3xl animate-float"></div>
            <div class="absolute -bottom-40 -left-40 h-80 w-80 rounded-full bg-gradient-to-br from-blue-200/40 to-purple-200/40 blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-96 w-96 rounded-full bg-gradient-to-br from-emerald-200/30 to-sky-200/30 blur-3xl animate-float" style="animation-delay: 4s;"></div>
        </div>
        
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgxNCwxNjUsMjMzLDAuMDUpIiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-60"></div>
        
        <div class="relative z-10 mx-auto max-w-6xl px-6 text-center py-12">
            <!-- Badge -->
            <div class="mb-10 inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white/80 backdrop-blur-sm px-5 py-2.5 text-sm font-medium text-sky-700 shadow-lg shadow-sky-500/10 animate-fade-in">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-500 opacity-75"></span>
                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-sky-500"></span>
                </span>
                Available for new opportunities
            </div>

            <!-- Main Heading -->
            <h1 class="mb-8 text-5xl font-extrabold tracking-tight text-slate-900 sm:text-6xl md:text-7xl lg:text-8xl animate-fade-in-up">
                Building Digital<br>
                <span class="bg-gradient-to-r from-sky-600 via-blue-600 to-emerald-600 bg-clip-text text-transparent animate-gradient-x">
                    Experiences
                </span>
            </h1>

            <!-- Tagline -->
            <p class="mx-auto mb-12 max-w-3xl text-base leading-relaxed text-slate-600 sm:text-lg md:text-xl animate-fade-in px-4" style="animation-delay: 0.2s;">
                {{ \App\Models\SiteSetting::where('key', 'tagline')->value('value') ?? "I'm Abiya Makruf, a Full Stack Engineer specializing in Laravel, Cloud Architecture, and AI Integration." }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap justify-center gap-4 animate-fade-in" style="animation-delay: 0.4s;">
                <a href="#about" 
                   class="group inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-600 to-emerald-600 px-8 py-4 text-base font-semibold text-white shadow-lg shadow-sky-500/30 transition-all duration-300 hover:shadow-xl hover:shadow-sky-500/40 hover:scale-105">
                    <span>Explore My Work</span>
                    <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <button onclick="document.getElementById('ai-widget').scrollIntoView({behavior: 'smooth'})" 
                        class="group inline-flex items-center gap-3 rounded-xl border-2 border-slate-200 bg-white/80 backdrop-blur-sm px-8 py-4 text-base font-semibold text-slate-700 shadow-lg shadow-slate-200/50 transition-all duration-300 hover:border-sky-300 hover:bg-sky-50 hover:text-sky-700 hover:shadow-xl hover:shadow-sky-200/50">
                    <img src="/gemini-color.svg" alt="Gemini" class="h-6 w-6 transition-transform group-hover:scale-110">
                    <span>Ask Gemini AI</span>
                </button>
            </div>

            <!-- Stats Preview -->
            <div class="mt-24 mb-16 grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-4 animate-fade-in" style="animation-delay: 0.6s;">
                <div class="rounded-2xl border border-slate-200/50 bg-white/60 backdrop-blur-sm p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-emerald-600 bg-clip-text text-transparent">{{ $latestProjects->count() }}+</div>
                    <div class="mt-1 text-sm font-medium text-slate-600">Projects</div>
                </div>
                <div class="rounded-2xl border border-slate-200/50 bg-white/60 backdrop-blur-sm p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-emerald-600 bg-clip-text text-transparent">{{ \App\Models\Skill::count() }}+</div>
                    <div class="mt-1 text-sm font-medium text-slate-600">Skills</div>
                </div>
                <div class="rounded-2xl border border-slate-200/50 bg-white/60 backdrop-blur-sm p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-emerald-600 bg-clip-text text-transparent">{{ \App\Models\Achievement::count() }}+</div>
                    <div class="mt-1 text-sm font-medium text-slate-600">Awards</div>
                </div>
                <div class="rounded-2xl border border-slate-200/50 bg-white/60 backdrop-blur-sm p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-emerald-600 bg-clip-text text-transparent">{{ \App\Models\Experience::count() }}+</div>
                    <div class="mt-1 text-sm font-medium text-slate-600">Experiences</div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce z-20">
            <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </section>

    <!-- About Me Section - Enhanced -->
    <section id="about" class="relative bg-white py-24 md:py-32">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-16 lg:grid-cols-2 items-center">
                <!-- Image Side -->
                <div class="flex justify-center lg:justify-start order-1 lg:order-1" data-aos="fade-right">
                    @php
                        $aboutPhoto = \App\Models\SiteSetting::where('key','about_photo_url')->value('value');
                    @endphp
                    <div class="relative group">
                        <!-- Decorative background -->
                        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-r from-sky-500 to-emerald-500 opacity-20 blur-2xl group-hover:opacity-30 transition-opacity duration-500"></div>
                        
                        <!-- Main photo -->
                        <div class="relative h-80 w-80 overflow-hidden rounded-3xl border-4 border-white shadow-2xl shadow-slate-300/50 transition-all duration-500 group-hover:scale-105 group-hover:rotate-2 group-hover:shadow-3xl">
                            @if($aboutPhoto)
                                <img src="{{ $aboutPhoto }}" alt="Profile photo" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-slate-400">
                                    <svg class="h-32 w-32" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Floating badges -->
                        <div class="absolute -top-4 -right-4 rounded-2xl border border-sky-200 bg-white px-4 py-2 shadow-xl shadow-sky-500/20 backdrop-blur-sm animate-float">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-emerald-500"></span>
                                <span class="text-sm font-semibold text-slate-700">Available</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Side -->
                <div class="space-y-6 order-2 lg:order-2" data-aos="fade-left">
                    @php
                        $aboutName = \App\Models\SiteSetting::where('key','about_name')->value('value') ?? 'Abiya Makruf';
                        $aboutDesc = \App\Models\SiteSetting::where('key','about_description')->value('value') ?? 'Full Stack Engineer focused on Laravel, Cloud, and AI.';
                        $contactEmail = \App\Models\SiteSetting::where('key','contact_email')->value('value');
                        $contactEmailUni = \App\Models\SiteSetting::where('key','contact_email_university')->value('value');
                        $contactPhone = \App\Models\SiteSetting::where('key','contact_phone')->value('value');
                        $contactLocation = \App\Models\SiteSetting::where('key','contact_location')->value('value');
                    @endphp

                    <!-- Section Label -->
                    <div class="flex items-center gap-3">
                        <div class="h-1 w-12 rounded-full bg-gradient-to-r from-sky-500 to-emerald-500"></div>
                        <span class="text-sm font-semibold uppercase tracking-wider text-sky-600">About Me</span>
                    </div>

                    <!-- Name & Title -->
                    <div>
                        <h2 class="text-4xl font-bold text-slate-900 md:text-5xl">{{ $aboutName }}</h2>
                        <p class="mt-2 text-lg text-slate-600">{{ $contactLocation ?? 'Based in Indonesia' }}</p>
                    </div>

                    <!-- Description -->
                    <p class="text-lg leading-relaxed text-slate-600">{{ $aboutDesc }}</p>

                    <!-- Contact Info -->
                    <div class="space-y-3">
                        @if($contactEmail)
                            <a href="mailto:{{ $contactEmail }}" class="group flex items-center gap-3 text-slate-600 hover:text-sky-600 transition-smooth">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-50 text-sky-600 transition-colors group-hover:bg-sky-100">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $contactEmail }}</span>
                            </a>
                        @endif
                        @if($contactPhone)
                            <a href="tel:{{ $contactPhone }}" class="group flex items-center gap-3 text-slate-600 hover:text-sky-600 transition-smooth">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 transition-colors group-hover:bg-emerald-100">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span class="font-medium">{{ $contactPhone }}</span>
                            </a>
                        @endif
                    </div>

                    <!-- Social Links -->
                    @php
                        $socials = \App\Models\SocialLink::allSafe();
                    @endphp
                    @if($socials->isNotEmpty())
                        <div class="pt-4">
                            <p class="mb-4 text-sm font-semibold uppercase tracking-wider text-slate-500">Connect with me</p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($socials as $social)
                                    <a href="{{ $social->url }}" target="_blank" 
                                       class="group flex h-12 w-12 items-center justify-center rounded-xl border-2 border-slate-200 bg-white transition-all duration-300 hover:border-sky-500 hover:bg-sky-50 hover:shadow-lg hover:shadow-sky-500/20 hover:-translate-y-1"
                                       title="{{ $social->platform }}">
                                        @if($social->icon_path)
                                            <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-6 w-6 object-contain opacity-70 group-hover:opacity-100 transition-opacity">
                                        @elseif($social->icon_class)
                                            <span class="{{ $social->icon_class }} text-xl text-slate-600 group-hover:text-sky-600 transition-colors"></span>
                                        @else
                                            <span class="text-sm font-bold text-slate-600 group-hover:text-sky-600 transition-colors">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Projects Section - Enhanced -->
    <section class="relative py-24 md:py-32 bg-gradient-to-br from-slate-50 to-white overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-20 right-0 h-72 w-72 rounded-full bg-sky-200/30 blur-3xl"></div>
        <div class="absolute bottom-20 left-0 h-72 w-72 rounded-full bg-emerald-200/30 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-6">
            <!-- Section Header -->
            <div class="mb-16 text-center">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-sky-200 bg-white px-4 py-2 text-sm font-medium text-sky-600 shadow-sm">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Portfolio
                </div>
                <h2 class="text-4xl font-bold text-slate-900 md:text-5xl">Featured Projects</h2>
                <p class="mt-4 text-lg text-slate-600">Explore my latest work in web development and AI</p>
            </div>
            
            <!-- Projects Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 mb-12">
                @forelse($latestProjects as $index => $project)
                    <article class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2" 
                             data-aos="fade-up" 
                             data-aos-delay="{{ $index * 100 }}">
                        <!-- Image -->
                        <div class="relative aspect-video w-full overflow-hidden bg-slate-100">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" 
                                     alt="{{ $project->title }}" 
                                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex h-full items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                                    <svg class="h-16 w-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1 rounded-full border border-white/20 bg-white/90 backdrop-blur-sm px-3 py-1.5 text-xs font-semibold text-sky-700 shadow-lg">
                                    <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                    {{ $project->category }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-3">
                            <h3 class="text-xl font-bold text-slate-900 transition-colors group-hover:text-sky-600">
                                {{ $project->title }}
                            </h3>
                            <p class="text-sm leading-relaxed text-slate-600 line-clamp-2">
                                {{ $project->short_description }}
                            </p>

                            <!-- View Project Link -->
                            <div class="flex items-center gap-2 text-sm font-semibold text-sky-600 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                <span>View Details</span>
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </div>

                        <!-- Link Overlay -->
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0" aria-label="View {{ $project->title }}"></a>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-16">
                        <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                            <svg class="h-10 w-10 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <p class="text-slate-500">No projects published yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All CTA -->
            <div class="text-center">
                <a href="{{ route('projects.index') }}" 
                   class="group inline-flex items-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-8 py-4 text-base font-semibold text-slate-700 shadow-lg transition-all duration-300 hover:border-sky-500 hover:bg-sky-50 hover:text-sky-700 hover:shadow-xl hover:shadow-sky-200/50">
                    <span>View All Projects</span>
                    <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- AI Widget Section - Enhanced -->
    <section id="ai-widget" class="relative py-24 md:py-32 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
        <!-- Animated background -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        <div class="absolute top-20 right-20 h-96 w-96 rounded-full bg-sky-500/10 blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-20 h-96 w-96 rounded-full bg-emerald-500/10 blur-3xl animate-float" style="animation-delay: 3s;"></div>

        <div class="relative mx-auto max-w-4xl px-6">
            <!-- Section Header -->
            <div class="mb-12 text-center">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-sky-400/30 bg-sky-500/10 backdrop-blur-sm px-4 py-2 text-sm font-medium text-sky-300">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    AI Powered
                </div>
                <h2 class="text-4xl font-bold text-white md:text-5xl mb-4">Ask Gemini About Me</h2>
                <p class="text-lg text-slate-400">Get instant answers about my experience, skills, and projects</p>
            </div>

            <!-- AI Chat Interface -->
            <div class="overflow-hidden rounded-3xl border border-slate-700/50 bg-slate-800/50 backdrop-blur-xl shadow-2xl"
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
                
                <!-- Header -->
                <div class="relative overflow-hidden bg-gradient-to-r from-sky-600 via-blue-600 to-emerald-600 p-8">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-50"></div>
                    <div class="relative flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 shadow-xl">
                            <img src="/gemini-color.svg" alt="Gemini" class="h-8 w-8">
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white flex items-center gap-2">
                                Gemini AI Assistant
                            </h3>
                            <p class="text-sm text-sky-100 mt-1">Powered by Google Gemini & my CV data</p>
                        </div>
                    </div>
                </div>

                <!-- Chat Area -->
                <div class="p-8 space-y-6">
                    <!-- Response Area -->
                    <div class="min-h-[200px] rounded-2xl border border-slate-700 bg-slate-900/50 p-6">
                        <!-- Loading State -->
                        <template x-if="loading">
                            <div class="flex items-center gap-4 text-slate-300">
                                <div class="flex gap-1.5">
                                    <span class="h-2 w-2 rounded-full bg-sky-500 animate-bounce"></span>
                                    <span class="h-2 w-2 rounded-full bg-sky-500 animate-bounce" style="animation-delay: 0.1s;"></span>
                                    <span class="h-2 w-2 rounded-full bg-sky-500 animate-bounce" style="animation-delay: 0.2s;"></span>
                                </div>
                                <span class="text-sm font-medium">Gemini is thinking...</span>
                            </div>
                        </template>

                        <!-- Response Content -->
                        <div x-show="!loading && (answer || error)" x-transition>
                            <!-- Error State -->
                            <div x-show="error" class="flex items-start gap-3 rounded-xl border border-red-500/20 bg-red-500/10 p-4">
                                <svg class="h-5 w-5 shrink-0 text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-red-200" x-text="error"></p>
                            </div>

                            <!-- Success State -->
                            <div x-show="!error && answer" class="prose prose-invert prose-sm max-w-none prose-headings:text-slate-100 prose-p:text-slate-200 prose-a:text-sky-400 prose-strong:text-slate-100 prose-code:text-sky-300 prose-pre:bg-slate-950/50 prose-pre:border prose-pre:border-slate-700 prose-li:text-slate-200 prose-ul:text-slate-200 prose-ol:text-slate-200" x-html="marked.parse(answer)"></div>
                        </div>

                        <!-- Empty State -->
                        <div x-show="!loading && !answer && !error" class="flex flex-col items-center justify-center py-8 text-center">
                            <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-sky-500/20 to-emerald-500/20 border border-sky-500/20">
                                <svg class="h-8 w-8 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <p class="text-slate-400 text-sm">Ask me anything about Abiya's experience, skills, or projects</p>
                        </div>
                    </div>

                    <!-- Input Form -->
                    <form class="space-y-4" @submit.prevent="ask()">
                        <div class="relative">
                            <input x-ref="input" 
                                   type="text" 
                                   x-model="question" 
                                   placeholder="e.g., What are your strongest technical skills?" 
                                   class="w-full rounded-xl border-slate-600 bg-slate-900/50 px-6 py-4 pr-24 text-white placeholder:text-slate-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 outline-none transition">
                            <button type="submit" 
                                    :disabled="loading || !question.trim()" 
                                    class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-2 rounded-lg bg-gradient-to-r from-sky-600 to-emerald-600 px-6 py-2.5 text-sm font-semibold text-white transition-all duration-300 hover:shadow-lg hover:shadow-sky-500/30 disabled:opacity-50 disabled:cursor-not-allowed hover:scale-105 disabled:hover:scale-100">
                                <span x-show="!loading">Ask</span>
                                <span x-show="loading" class="flex items-center gap-2">
                                    <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <!-- Example Questions -->
                        <div class="space-y-3">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Suggested Questions</p>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" 
                                        @click="setExample('Tell me about your experience')" 
                                        class="rounded-lg border border-slate-700 bg-slate-800/50 px-4 py-2 text-sm text-slate-300 transition-all duration-300 hover:border-sky-500 hover:bg-sky-500/10 hover:text-sky-300">
                                    Tell me about your experience
                                </button>
                                <button type="button" 
                                        @click="setExample('What are your technical skills?')" 
                                        class="rounded-lg border border-slate-700 bg-slate-800/50 px-4 py-2 text-sm text-slate-300 transition-all duration-300 hover:border-sky-500 hover:bg-sky-500/10 hover:text-sky-300">
                                    What are your technical skills?
                                </button>
                                <button type="button" 
                                        @click="setExample('How can I contact you?')" 
                                        class="rounded-lg border border-slate-700 bg-slate-800/50 px-4 py-2 text-sm text-slate-300 transition-all duration-300 hover:border-sky-500 hover:bg-sky-500/10 hover:text-sky-300">
                                    How can I contact you?
                                </button>
                                <button type="button" 
                                        @click="setExample('What projects have you worked on?')" 
                                        class="rounded-lg border border-slate-700 bg-slate-800/50 px-4 py-2 text-sm text-slate-300 transition-all duration-300 hover:border-sky-500 hover:bg-sky-500/10 hover:text-sky-300">
                                    What projects have you worked on?
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
