<x-layouts.main :title="$project->title . ' - Abiya Makruf'">
    <!-- Back Button -->
    <div class="bg-slate-50">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
            <a href="{{ route('projects.index') }}" 
               class="group inline-flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-sky-500 transition-colors duration-300">
                <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Projects
            </a>
        </div>
    </div>

    <!-- Hero Section with Thumbnail -->
    <div class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-sky-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Project Info -->
                <div class="space-y-6 animate-fadeInUp">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-sky-500/20 to-emerald-500/20 backdrop-blur-xl border border-white/10 text-sm font-medium text-white">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            {{ $project->category }}
                        </span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        {{ $project->title }}
                    </h1>

                    <p class="text-lg text-slate-300 leading-relaxed">
                        {{ $project->short_description }}
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-4">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" 
                               class="group inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-xl font-medium hover:bg-slate-100 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                View on GitHub
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        @endif

                        @if($project->website_url)
                            <a href="{{ $project->website_url }}" target="_blank" 
                               class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-sky-500 to-emerald-500 text-white rounded-xl font-medium hover:from-sky-600 hover:to-emerald-600 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-sky-500/50">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                </svg>
                                Visit Website
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="animate-fadeInUp" style="animation-delay: 0.2s;">
                    @if($project->thumbnail_path)
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                            <img src="{{ $project->thumbnail_path }}" 
                                 alt="{{ $project->title }}" 
                                 class="relative w-full h-auto rounded-2xl shadow-2xl ring-1 ring-white/10 transform transition-transform duration-500 group-hover:scale-105">
                        </div>
                    @else
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-sky-500/20 to-emerald-500/20 rounded-2xl blur-xl"></div>
                            <div class="relative aspect-video w-full bg-slate-800 rounded-2xl border border-white/10 flex items-center justify-center">
                                <div class="text-center">
                                    <svg class="w-20 h-20 text-slate-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-slate-500 font-medium">No Image Available</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Description -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Full Description -->
                    <div class="animate-fadeInUp">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span class="w-1 h-8 bg-gradient-to-b from-sky-500 to-emerald-500 rounded-full"></span>
                            Project Overview
                        </h2>
                        <div class="prose prose-lg prose-slate max-w-none">
                            {!! nl2br(e($project->full_description)) !!}
                        </div>
                    </div>

                    <!-- Gallery -->
                    @if($project->images->count() > 0)
                        <div class="animate-fadeInUp" style="animation-delay: 0.1s;">
                            <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                                <span class="w-1 h-8 bg-gradient-to-b from-sky-500 to-emerald-500 rounded-full"></span>
                                Gallery
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @foreach($project->images as $image)
                                    <div class="group relative overflow-hidden rounded-2xl bg-slate-100 shadow-lg hover:shadow-xl transition-all duration-300">
                                        <div class="aspect-video overflow-hidden">
                                            <img src="{{ $image->image_path }}" 
                                                 alt="{{ $image->caption ?? 'Gallery Image' }}" 
                                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </div>
                                        @if($image->caption)
                                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/60 to-transparent p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                                <p class="text-white text-sm font-medium">{{ $image->caption }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Tech Stack -->
                    @if($project->tech_stack)
                        <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 shadow-lg border border-slate-200 animate-fadeInUp" style="animation-delay: 0.2s;">
                            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                                Technologies Used
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->tech_stack as $tech)
                                    <span class="px-3 py-1.5 bg-white rounded-lg text-sm font-medium text-slate-700 shadow-sm border border-slate-200 hover:border-sky-300 hover:shadow transition-all duration-200">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Project Info -->
                    <div class="bg-gradient-to-br from-sky-50 to-emerald-50 rounded-2xl p-6 shadow-lg border border-sky-200 animate-fadeInUp" style="animation-delay: 0.3s;">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Project Details
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-slate-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <div>
                                    <p class="text-sm text-slate-500 font-medium">Category</p>
                                    <p class="text-slate-900 font-semibold">{{ $project->category }}</p>
                                </div>
                            </div>
                            
                            @if($project->images->count() > 0)
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-slate-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-slate-500 font-medium">Gallery Images</p>
                                        <p class="text-slate-900 font-semibold">{{ $project->images->count() }} Images</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- CTA Card -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-lg animate-fadeInUp" style="animation-delay: 0.4s;">
                        <div class="text-center space-y-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-xl flex items-center justify-center mx-auto">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-lg mb-2">Interested in this project?</h4>
                                <p class="text-slate-300 text-sm">Let's discuss how we can work together.</p>
                            </div>
                            <a href="/#contact" 
                               class="inline-flex items-center gap-2 px-6 py-3 bg-white text-slate-900 rounded-xl font-medium hover:bg-slate-100 transition-all duration-300 hover:scale-105">
                                Get in Touch
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
