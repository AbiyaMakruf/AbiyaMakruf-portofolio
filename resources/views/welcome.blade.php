<x-layouts.main>
    <!-- Modern Hero Section -->
    <section class="relative flex min-h-screen items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-accent-50">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-primary-400/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-accent-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-br from-primary-300/10 to-accent-300/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8 animate-fadeInUp">
                <!-- Status Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass border border-primary-200 animate-pulse-glow">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary-500"></span>
                    </span>
                    <span class="text-sm font-semibold text-zinc-700">Available for new opportunities</span>
                </div>

                <!-- Main Heading -->
                <div class="space-y-4">
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-zinc-900 leading-tight">
                        Building Digital
                        <span class="block gradient-text mt-2">Experiences</span>
                    </h1>
                    <p class="mx-auto max-w-3xl text-lg sm:text-xl text-zinc-600 leading-relaxed px-4">
                        {{ \App\Models\SiteSetting::where('key', 'tagline')->value('value') ?? "Full Stack Engineer specializing in Laravel, Cloud Architecture, and AI Integration. Creating scalable and modern web solutions." }}
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                    <a href="#about" 
                       class="group inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-gradient-to-r from-primary-500 to-accent-500 text-white font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 transition-all duration-300 hover:scale-105">
                        <span>Discover My Work</span>
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <button onclick="document.getElementById('ai-widget').scrollIntoView({behavior: 'smooth'})" 
                            class="group inline-flex items-center gap-3 px-8 py-4 rounded-xl border-2 border-zinc-200 bg-white text-zinc-700 font-semibold hover:border-primary-500 hover:bg-primary-50 transition-all duration-300 hover:scale-105">
                        <img src="/gemini-color.svg" alt="Gemini" class="h-5 w-5">
                        <span>Ask AI About Me</span>
                    </button>
                </div>

                <!-- Scroll Indicator -->
                <div class="pt-12 animate-fadeIn" style="animation-delay: 1s;">
                    <a href="#about" class="inline-flex flex-col items-center gap-2 text-zinc-400 hover:text-primary-500 transition-colors duration-300">
                        <span class="text-xs font-medium uppercase tracking-wider">Scroll to explore</span>
                        <svg class="w-5 h-5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Me Section -->
    <section id="about" class="relative bg-white py-20 lg:py-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-5 gap-12 lg:gap-16 items-center">
                <!-- Profile Photo -->
                <div class="lg:col-span-2 flex justify-center lg:justify-end animate-fadeInUp">
                    @php
                        $aboutPhoto = \App\Models\SiteSetting::where('key','about_photo_url')->value('value');
                    @endphp
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity duration-500"></div>
                        <div class="relative h-72 w-72 lg:h-96 lg:w-96">
                            @if($aboutPhoto)
                                <img src="{{ $aboutPhoto }}" alt="Profile photo" class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center">
                                    <div class="text-center space-y-2">
                                        <svg class="w-20 h-20 text-zinc-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <p class="text-zinc-400 text-sm">No Photo</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- About Content -->
                <div class="lg:col-span-3 space-y-6 animate-fadeInUp" style="animation-delay: 0.2s;">
                    @php
                        $aboutName = \App\Models\SiteSetting::where('key','about_name')->value('value') ?? 'Abiya Makruf';
                        $aboutDesc = \App\Models\SiteSetting::where('key','about_description')->value('value') ?? 'Full Stack Engineer focused on Laravel, Cloud, and AI.';
                        $contactEmail = \App\Models\SiteSetting::where('key','contact_email')->value('value');
                        $contactEmailUni = \App\Models\SiteSetting::where('key','contact_email_university')->value('value');
                        $contactPhone = \App\Models\SiteSetting::where('key','contact_phone')->value('value');
                        $contactLocation = \App\Models\SiteSetting::where('key','contact_location')->value('value');
                    @endphp
                    
                    <!-- Section Header -->
                    <div class="flex items-center gap-3">
                        <div class="h-1 w-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full"></div>
                        <span class="text-sm font-semibold text-primary-600 uppercase tracking-wider">About Me</span>
                    </div>

                    <div class="space-y-4">
                        <h2 class="text-4xl lg:text-5xl font-bold text-zinc-900 leading-tight">
                            {{ $aboutName }}
                        </h2>
                        <div class="flex items-center gap-2 text-zinc-600">
                            <svg class="w-5 h-5 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="font-medium">{{ $contactLocation ?? 'Based in Indonesia' }}</span>
                        </div>
                        <p class="text-lg text-zinc-600 leading-relaxed">
                            {{ $aboutDesc }}
                        </p>
                    </div>

                    <!-- Contact Info Grid -->
                    <div class="grid sm:grid-cols-2 gap-4 pt-4">
                        @if($contactEmail)
                            <a href="mailto:{{ $contactEmail }}" class="group flex items-center gap-3 p-4 rounded-xl bg-zinc-50 hover:bg-primary-50 border border-zinc-200 hover:border-primary-300 transition-all duration-200">
                                <div class="flex-shrink-0 w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                    <svg class="w-5 h-5 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-zinc-500">Email</p>
                                    <p class="text-sm font-semibold text-zinc-900 truncate">{{ $contactEmail }}</p>
                                </div>
                            </a>
                        @endif
                        @if($contactPhone)
                            <a href="tel:{{ $contactPhone }}" class="group flex items-center gap-3 p-4 rounded-xl bg-zinc-50 hover:bg-primary-50 border border-zinc-200 hover:border-primary-300 transition-all duration-200">
                                <div class="flex-shrink-0 w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                    <svg class="w-5 h-5 text-accent-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-zinc-500">Phone</p>
                                    <p class="text-sm font-semibold text-zinc-900 truncate">{{ $contactPhone }}</p>
                                </div>
                            </a>
                        @endif
                    </div>

                    <!-- Social Links -->
                    @php
                        $socials = \App\Models\SocialLink::allSafe();
                    @endphp
                    @if($socials->isNotEmpty())
                        <div class="pt-6">
                            <p class="text-sm font-semibold text-zinc-700 mb-4">Connect with me</p>
                            <div class="flex flex-wrap gap-3">
                                @foreach($socials as $social)
                                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                       class="group flex items-center justify-center h-12 w-12 rounded-xl bg-zinc-100 hover:bg-gradient-to-br hover:from-primary-500 hover:to-accent-500 border border-zinc-200 hover:border-transparent transition-all duration-300 hover:scale-110 shadow-sm hover:shadow-md">
                                        @if($social->icon_path)
                                            <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-6 w-6 object-contain group-hover:brightness-0 group-hover:invert transition-all duration-300">
                                        @elseif($social->icon_class)
                                            <span class="{{ $social->icon_class }} text-xl text-zinc-600 group-hover:text-white transition-colors duration-300"></span>
                                        @else
                                            <span class="text-sm font-bold text-zinc-700 group-hover:text-white transition-colors duration-300">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
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

    <!-- Latest Projects Preview -->
    <section class="py-20 lg:py-32 bg-gradient-to-br from-zinc-50 to-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12 gap-6 animate-fadeInUp">
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <div class="h-1 w-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full"></div>
                        <span class="text-sm font-semibold text-primary-600 uppercase tracking-wider">Portfolio</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-zinc-900">Latest Projects</h2>
                    <p class="text-zinc-600">Showcasing my recent work and achievements</p>
                </div>
                <a href="{{ route('projects.index') }}" 
                   class="group inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-zinc-900 text-white font-semibold hover:bg-zinc-800 transition-all duration-300 hover:scale-105 shadow-lg">
                    <span>View All Projects</span>
                    <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
            
            <!-- Projects Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse($latestProjects as $index => $project)
                    <div class="group card-modern animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                        <!-- Project Thumbnail -->
                        <div class="relative aspect-video w-full bg-gradient-to-br from-zinc-100 to-zinc-50 overflow-hidden rounded-t-2xl">
                            @if($project->thumbnail_path)
                                <img src="{{ $project->thumbnail_path }}" alt="{{ $project->title }}" 
                                     class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="flex h-full items-center justify-center">
                                    <svg class="w-16 h-16 text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="p-6 space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-primary-100 text-primary-700 text-xs font-semibold">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    {{ $project->category }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-zinc-900 group-hover:text-primary-600 transition-colors duration-200 line-clamp-2">
                                {{ $project->title }}
                            </h3>
                            <p class="text-zinc-600 text-sm leading-relaxed line-clamp-2">
                                {{ $project->short_description }}
                            </p>
                            <div class="pt-2">
                                <span class="inline-flex items-center gap-2 text-sm font-medium text-primary-600 group-hover:gap-3 transition-all duration-200">
                                    View Project
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('projects.show', $project) }}" class="absolute inset-0"></a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-zinc-100 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-zinc-900 mb-2">No projects yet</h3>
                        <p class="text-zinc-500">Check back later for exciting projects!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- AI Widget Section -->
    <section id="ai-widget" class="py-20 lg:py-32 bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center space-y-4 mb-12 animate-fadeInUp">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20">
                    <img src="/gemini-color.svg" alt="Gemini" class="h-5 w-5">
                    <span class="text-sm font-semibold text-white">Powered by Google Gemini</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-white">Ask AI About Me</h2>
                <p class="text-zinc-300 text-lg">Get instant answers about my experience, skills, and projects</p>
            </div>

            <!-- AI Chat Card -->
            <div class="card-glass backdrop-blur-2xl bg-white/10 border-white/20 overflow-hidden animate-fadeInUp" style="animation-delay: 0.2s;"
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
                
                <!-- Chat Response Area -->
                <div class="p-6 lg:p-8">
                    <div class="min-h-[200px] rounded-2xl bg-white backdrop-blur-xl p-6 border border-zinc-200 mb-6 shadow-lg">
                        <!-- Loading State -->
                        <template x-if="loading">
                            <div class="flex flex-col items-center justify-center py-8 space-y-4">
                                <div class="relative">
                                    <div class="w-16 h-16 border-4 border-primary-200 border-t-primary-500 rounded-full animate-spin"></div>
                                    <div class="absolute inset-0 w-16 h-16 border-4 border-transparent border-t-accent-500 rounded-full animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
                                </div>
                                <p class="text-zinc-900 font-medium">Gemini is thinking...</p>
                                <p class="text-zinc-600 text-sm">Analyzing your question</p>
                            </div>
                        </template>

                        <!-- Answer/Error Display -->
                        <div x-show="!loading && (answer || error)" x-transition class="space-y-4">
                            <!-- Error Message -->
                            <div x-show="error" class="flex items-start gap-3 p-4 bg-red-50 border border-red-200 rounded-xl">
                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-red-700 text-sm" x-text="error"></p>
                            </div>
                            
                            <!-- Success Answer -->
                            <div x-show="!error && answer" class="prose prose-sm max-w-none">
                                <div x-html="marked.parse(answer)" class="text-zinc-900 leading-relaxed [&>p]:text-zinc-900 [&>ul]:text-zinc-900 [&>ol]:text-zinc-900 [&>li]:text-zinc-900 [&>h1]:text-zinc-950 [&>h2]:text-zinc-950 [&>h3]:text-zinc-950 [&>strong]:text-zinc-950 [&>code]:bg-zinc-100 [&>code]:text-primary-700 [&>code]:px-2 [&>code]:py-1 [&>code]:rounded"></div>
                            </div>
                        </div>

                        <!-- Empty State -->
                        <div x-show="!loading && !answer && !error" class="flex flex-col items-center justify-center py-8 text-center space-y-3">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-500/20 to-accent-500/20 rounded-2xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <p class="text-zinc-900 font-medium">Ask me anything!</p>
                            <p class="text-zinc-600 text-sm max-w-md">Try one of the example questions below or type your own</p>
                        </div>
                    </div>

                    <!-- Input Form -->
                    <form class="space-y-4" @submit.prevent="ask()">
                        <div class="flex gap-3">
                            <input x-ref="input" 
                                   type="text" 
                                   x-model="question" 
                                   placeholder="e.g., What technologies do you work with?" 
                                   class="flex-1 px-5 py-4 rounded-xl bg-white/10 backdrop-blur-xl border border-white/20 text-zinc-900 placeholder-zinc-500 focus:border-primary-400 focus:ring-2 focus:ring-primary-500/50 outline-none transition-all duration-200 bg-white/80">
                            <button type="submit" 
                                    :disabled="loading || !question.trim()" 
                                    class="px-8 py-4 rounded-xl bg-gradient-to-r from-primary-500 to-accent-500 text-white font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-300 hover:scale-105 flex items-center gap-2 whitespace-nowrap">
                                <span x-show="!loading">Ask AI</span>
                                <span x-show="loading" class="flex items-center gap-2">
                                    <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span>Asking...</span>
                                </span>
                            </button>
                        </div>

                        <!-- Example Questions -->
                        <div class="flex flex-wrap gap-2">
                            <p class="w-full text-zinc-800 text-sm font-medium mb-1">Try asking:</p>
                            <button type="button" 
                                    @click="setExample('Tell me about your experience')" 
                                    class="px-4 py-2 text-sm bg-white/80 hover:bg-white text-zinc-800 rounded-xl transition-all duration-200 border border-zinc-200 hover:border-primary-300">
                                💼 Your experience
                            </button>
                            <button type="button" 
                                    @click="setExample('What are your technical skills?')" 
                                    class="px-4 py-2 text-sm bg-white/80 hover:bg-white text-zinc-800 rounded-xl transition-all duration-200 border border-zinc-200 hover:border-primary-300">
                                ⚡ Technical skills
                            </button>
                            <button type="button" 
                                    @click="setExample('What projects have you worked on?')" 
                                    class="px-4 py-2 text-sm bg-white/80 hover:bg-white text-zinc-800 rounded-xl transition-all duration-200 border border-zinc-200 hover:border-primary-300">
                                🚀 Projects
                            </button>
                            <button type="button" 
                                    @click="setExample('How can I contact you?')" 
                                    class="px-4 py-2 text-sm bg-white/80 hover:bg-white text-zinc-800 rounded-xl transition-all duration-200 border border-zinc-200 hover:border-primary-300">
                                📧 Contact info
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
