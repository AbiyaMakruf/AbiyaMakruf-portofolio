<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Abiya Makruf - Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-blue-50/30 text-slate-900 antialiased selection:bg-sky-500 selection:text-white flex flex-col min-h-screen">
    
    <!-- Enhanced Navbar with scroll effect -->
    <nav x-data="{ scrolled: false, mobileMenuOpen: false }" 
         @scroll.window="scrolled = window.pageYOffset > 20"
         :class="scrolled ? 'shadow-lg shadow-slate-200/50' : 'shadow-sm'"
         class="fixed top-0 z-50 w-full border-b border-slate-200/50 glass transition-all duration-300">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="group flex items-center gap-3 transition-smooth">
                <div class="relative flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 shadow-lg shadow-sky-500/30 transition-smooth group-hover:shadow-xl group-hover:shadow-sky-500/40 group-hover:scale-105">
                    <span class="text-xl font-bold text-white">A</span>
                </div>
                <div class="hidden sm:block">
                    <span class="text-xl font-bold bg-gradient-to-r from-sky-600 to-emerald-600 bg-clip-text text-transparent">Abiya Makruf</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('projects.index') }}" 
                   class="relative text-sm font-medium text-slate-700 hover:text-sky-600 transition-smooth group {{ request()->routeIs('projects.*') ? 'text-sky-600' : '' }}">
                    Projects
                    <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-gradient-to-r from-sky-500 to-emerald-500 transition-all duration-300 group-hover:w-full {{ request()->routeIs('projects.*') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('skills') }}" 
                   class="relative text-sm font-medium text-slate-700 hover:text-sky-600 transition-smooth group {{ request()->routeIs('skills') ? 'text-sky-600' : '' }}">
                    Skills
                    <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-gradient-to-r from-sky-500 to-emerald-500 transition-all duration-300 group-hover:w-full {{ request()->routeIs('skills') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('career') }}" 
                   class="relative text-sm font-medium text-slate-700 hover:text-sky-600 transition-smooth group {{ request()->routeIs('career*') ? 'text-sky-600' : '' }}">
                    Career
                    <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-gradient-to-r from-sky-500 to-emerald-500 transition-all duration-300 group-hover:w-full {{ request()->routeIs('career*') ? 'w-full' : '' }}"></span>
                </a>
                <a href="{{ route('activity') }}" 
                   class="relative text-sm font-medium text-slate-700 hover:text-sky-600 transition-smooth group {{ request()->routeIs('activity') ? 'text-sky-600' : '' }}">
                    Activity
                    <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-gradient-to-r from-sky-500 to-emerald-500 transition-all duration-300 group-hover:w-full {{ request()->routeIs('activity') ? 'w-full' : '' }}"></span>
                </a>
            </div>

            <!-- CTA & Auth -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('cv.download') }}" 
                   class="group flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-emerald-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-sky-500/30 transition-all duration-300 hover:shadow-xl hover:shadow-sky-500/40 hover:scale-105">
                    <svg class="h-4 w-4 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Download CV
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white/80 px-4 py-2.5 text-sm font-medium text-slate-700 transition-smooth hover:border-sky-300 hover:bg-sky-50">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-sky-600 transition-smooth">Login</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden flex items-center justify-center h-10 w-10 rounded-xl border border-slate-200 bg-white/80 text-slate-700 transition-smooth hover:bg-slate-100">
                <svg x-show="!mobileMenuOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileMenuOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.away="mobileMenuOpen = false"
             class="lg:hidden border-t border-slate-200/50 bg-white/95 backdrop-blur-lg">
            <div class="mx-auto max-w-7xl space-y-1 px-4 py-4">
                <a href="{{ route('projects.index') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-smooth {{ request()->routeIs('projects.*') ? 'bg-sky-50 text-sky-600' : '' }}">Projects</a>
                <a href="{{ route('skills') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-smooth {{ request()->routeIs('skills') ? 'bg-sky-50 text-sky-600' : '' }}">Skills</a>
                <a href="{{ route('career') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-smooth {{ request()->routeIs('career*') ? 'bg-sky-50 text-sky-600' : '' }}">Career</a>
                <a href="{{ route('activity') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600 transition-smooth {{ request()->routeIs('activity') ? 'bg-sky-50 text-sky-600' : '' }}">Activity</a>
                <div class="pt-3 border-t border-slate-200">
                    <a href="{{ route('cv.download') }}" class="flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-emerald-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/30">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download CV
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Bottom Navbar - Enhanced -->
    <nav class="md:hidden fixed bottom-0 z-50 w-full border-t border-slate-200/80 glass shadow-2xl pb-safe">
        <div class="grid grid-cols-5 h-16">
            <a href="{{ route('home') }}" class="flex flex-col items-center justify-center gap-1 text-slate-500 hover:text-sky-600 transition-smooth {{ request()->routeIs('home') ? 'text-sky-600' : '' }}">
                <svg class="w-6 h-6 transition-transform {{ request()->routeIs('home') ? 'scale-110' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-[10px] font-medium">Home</span>
                @if(request()->routeIs('home'))
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-b-full"></span>
                @endif
            </a>
            <a href="{{ route('projects.index') }}" class="flex flex-col items-center justify-center gap-1 text-slate-500 hover:text-sky-600 transition-smooth {{ request()->routeIs('projects.*') ? 'text-sky-600' : '' }}">
                <svg class="w-6 h-6 transition-transform {{ request()->routeIs('projects.*') ? 'scale-110' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-[10px] font-medium">Projects</span>
                @if(request()->routeIs('projects.*'))
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-b-full"></span>
                @endif
            </a>
            <a href="{{ route('skills') }}" class="flex flex-col items-center justify-center gap-1 text-slate-500 hover:text-sky-600 transition-smooth {{ request()->routeIs('skills') ? 'text-sky-600' : '' }}">
                <svg class="w-6 h-6 transition-transform {{ request()->routeIs('skills') ? 'scale-110' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <span class="text-[10px] font-medium">Skills</span>
                @if(request()->routeIs('skills'))
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-b-full"></span>
                @endif
            </a>
            <a href="{{ route('career') }}" class="flex flex-col items-center justify-center gap-1 text-slate-500 hover:text-sky-600 transition-smooth {{ request()->routeIs('career*') ? 'text-sky-600' : '' }}">
                <svg class="w-6 h-6 transition-transform {{ request()->routeIs('career*') ? 'scale-110' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-[10px] font-medium">Career</span>
                @if(request()->routeIs('career*'))
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-b-full"></span>
                @endif
            </a>
            <a href="{{ route('activity') }}" class="flex flex-col items-center justify-center gap-1 text-slate-500 hover:text-sky-600 transition-smooth {{ request()->routeIs('activity') ? 'text-sky-600' : '' }}">
                <svg class="w-6 h-6 transition-transform {{ request()->routeIs('activity') ? 'scale-110' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="text-[10px] font-medium">Activity</span>
                @if(request()->routeIs('activity'))
                    <span class="absolute top-0 left-1/2 -translate-x-1/2 w-12 h-1 bg-gradient-to-r from-sky-500 to-emerald-500 rounded-b-full"></span>
                @endif
            </a>
        </div>
    </nav>

    <main class="pt-20 flex-grow">
        {{ $slot }}
    </main>

    <!-- Enhanced Footer -->
    <footer class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-300 pb-24 md:pb-12 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-40"></div>
        
        <div class="relative mx-auto max-w-7xl px-6 py-16">
            <div class="grid gap-12 md:grid-cols-3 mb-12">
                <!-- About -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 shadow-lg shadow-sky-500/30">
                            <span class="text-2xl font-bold text-white">A</span>
                        </div>
                        <span class="text-xl font-bold text-white">Abiya Makruf</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Full Stack Engineer passionate about building innovative solutions with Laravel, Cloud Architecture, and AI.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('projects.index') }}" class="text-sm hover:text-sky-400 transition-smooth inline-flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            Projects
                        </a></li>
                        <li><a href="{{ route('skills') }}" class="text-sm hover:text-sky-400 transition-smooth inline-flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            Skills & Achievements
                        </a></li>
                        <li><a href="{{ route('career') }}" class="text-sm hover:text-sky-400 transition-smooth inline-flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            Career
                        </a></li>
                        <li><a href="{{ route('activity') }}" class="text-sm hover:text-sky-400 transition-smooth inline-flex items-center gap-2">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            Activity
                        </a></li>
                    </ul>
                </div>

                <!-- Social Links -->
                <div class="space-y-4">
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Connect</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach(\App\Models\SocialLink::allSafe() as $social)
                            <a href="{{ $social->url }}" target="_blank" 
                               class="group flex h-11 w-11 items-center justify-center rounded-xl border border-slate-700 bg-slate-800/50 backdrop-blur-sm transition-all duration-300 hover:border-sky-500 hover:bg-sky-500/10 hover:shadow-lg hover:shadow-sky-500/20 hover:-translate-y-1"
                               title="{{ $social->platform }}">
                                @if($social->icon_path)
                                    <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-5 w-5 object-contain opacity-70 group-hover:opacity-100 transition-opacity">
                                @elseif($social->icon_class)
                                    <span class="{{ $social->icon_class }} text-lg text-slate-400 group-hover:text-sky-400 transition-colors"></span>
                                @else
                                    <span class="text-xs font-bold text-slate-400 group-hover:text-sky-400 transition-colors">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-700/50 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-400">
                    &copy; {{ date('Y') }} <span class="text-white font-medium">Abiya Makruf</span>. All rights reserved.
                </p>
                <p class="text-sm text-slate-400">
                    Built with <span class="text-red-400">♥</span> using <span class="text-white font-medium">Laravel</span> & <span class="text-white font-medium">Gemini AI</span>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
