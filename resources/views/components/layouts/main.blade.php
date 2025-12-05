<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Abiya Makruf - Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="bg-zinc-50 text-zinc-900 antialiased selection:bg-primary-500 selection:text-white flex flex-col min-h-screen" 
      x-data="{ scrolled: false, mobileMenuOpen: false }" 
      @scroll.window="scrolled = (window.pageYOffset > 50)">
    
    <!-- Modern Navbar -->
    <nav class="fixed top-0 z-50 w-full transition-all duration-300"
         :class="scrolled ? 'glass shadow-elegant' : 'bg-transparent'">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="group flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 shadow-lg flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                        <span class="text-white font-bold text-lg">AM</span>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-zinc-900 hidden sm:block">
                        Abiya Makruf
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('projects.index') }}" 
                       class="text-sm font-medium text-zinc-600 hover:text-primary-500 transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'text-primary-500' : '' }}">
                        Projects
                    </a>
                    <a href="{{ route('skills') }}" 
                       class="text-sm font-medium text-zinc-600 hover:text-primary-500 transition-colors duration-200 {{ request()->routeIs('skills') ? 'text-primary-500' : '' }}">
                        Skills & Achievements
                    </a>
                    <a href="{{ route('career') }}" 
                       class="text-sm font-medium text-zinc-600 hover:text-primary-500 transition-colors duration-200 {{ request()->routeIs('career*') ? 'text-primary-500' : '' }}">
                        Career
                    </a>
                    <a href="{{ route('activity') }}" 
                       class="text-sm font-medium text-zinc-600 hover:text-primary-500 transition-colors duration-200 {{ request()->routeIs('activity') ? 'text-primary-500' : '' }}">
                        Activity
                    </a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden lg:flex items-center gap-4">
                    <a href="{{ route('cv.download') }}" 
                       class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-primary-500 to-accent-500 text-white text-sm font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/40 transition-all duration-300 hover:scale-105">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download CV
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border-2 border-zinc-200 bg-white text-zinc-700 text-sm font-medium hover:border-primary-500 hover:text-primary-500 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-sm font-medium text-zinc-600 hover:text-primary-500 transition-colors duration-200">
                            Login
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden p-2 rounded-xl hover:bg-zinc-100 transition-colors duration-200">
                    <svg class="w-6 h-6 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="mobileMenuOpen = false"
             class="lg:hidden absolute top-full left-0 right-0 glass mt-2 mx-4 rounded-2xl shadow-lifted overflow-hidden"
             style="display: none;">
            <div class="py-4 px-4 space-y-2">
                <a href="{{ route('projects.index') }}" 
                   class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                    Projects
                </a>
                <a href="{{ route('skills') }}" 
                   class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                    Skills & Achievements
                </a>
                <a href="{{ route('career') }}" 
                   class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                    Career
                </a>
                <a href="{{ route('activity') }}" 
                   class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                    Activity
                </a>
                <div class="border-t border-zinc-200 my-2"></div>
                <a href="{{ route('cv.download') }}" 
                   class="block px-4 py-3 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-primary-500 to-accent-500 text-center">
                    Download CV
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="block px-4 py-3 rounded-xl text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition-colors duration-200">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Mobile Bottom Navigation -->
    <nav class="lg:hidden fixed bottom-0 z-50 w-full glass border-t border-zinc-200 pb-safe">
        <div class="grid grid-cols-5 h-16">
            <a href="{{ route('home') }}" 
               class="flex flex-col items-center justify-center gap-1 transition-colors duration-200 {{ request()->routeIs('home') ? 'text-primary-500' : 'text-zinc-500' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="text-[10px] font-medium">Home</span>
            </a>
            <a href="{{ route('projects.index') }}" 
               class="flex flex-col items-center justify-center gap-1 transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'text-primary-500' : 'text-zinc-500' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <span class="text-[10px] font-medium">Projects</span>
            </a>
            <a href="{{ route('skills') }}" 
               class="flex flex-col items-center justify-center gap-1 transition-colors duration-200 {{ request()->routeIs('skills') ? 'text-primary-500' : 'text-zinc-500' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span class="text-[10px] font-medium">Skills</span>
            </a>
            <a href="{{ route('career') }}" 
               class="flex flex-col items-center justify-center gap-1 transition-colors duration-200 {{ request()->routeIs('career*') ? 'text-primary-500' : 'text-zinc-500' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="text-[10px] font-medium">Career</span>
            </a>
            <a href="{{ route('activity') }}" 
               class="flex flex-col items-center justify-center gap-1 transition-colors duration-200 {{ request()->routeIs('activity') ? 'text-primary-500' : 'text-zinc-500' }}">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <span class="text-[10px] font-medium">Activity</span>
            </a>
        </div>
    </nav>

    <main class="pt-20 flex-grow">
        {{ $slot }}
    </main>

    <!-- Modern Footer -->
    <footer class="bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 text-white pb-20 lg:pb-0">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
                <!-- Brand Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 shadow-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">AM</span>
                        </div>
                        <span class="text-xl font-bold">Abiya Makruf</span>
                    </div>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        Building digital experiences with modern technologies and creative solutions.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">Navigation</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-sm text-zinc-400 hover:text-primary-400 transition-colors duration-200">Home</a></li>
                        <li><a href="{{ route('projects.index') }}" class="text-sm text-zinc-400 hover:text-primary-400 transition-colors duration-200">Projects</a></li>
                        <li><a href="{{ route('skills') }}" class="text-sm text-zinc-400 hover:text-primary-400 transition-colors duration-200">Skills</a></li>
                        <li><a href="{{ route('career') }}" class="text-sm text-zinc-400 hover:text-primary-400 transition-colors duration-200">Career</a></li>
                        <li><a href="{{ route('activity') }}" class="text-sm text-zinc-400 hover:text-primary-400 transition-colors duration-200">Activity</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">Contact</h3>
                    <ul class="space-y-2 text-sm text-zinc-400">
                        @php
                            $contactEmail = \App\Models\SiteSetting::where('key','contact_email')->value('value');
                            $contactPhone = \App\Models\SiteSetting::where('key','contact_phone')->value('value');
                            $contactLocation = \App\Models\SiteSetting::where('key','contact_location')->value('value');
                        @endphp
                        @if($contactEmail)
                            <li><a href="mailto:{{ $contactEmail }}" class="hover:text-primary-400 transition-colors duration-200">{{ $contactEmail }}</a></li>
                        @endif
                        @if($contactPhone)
                            <li><a href="tel:{{ $contactPhone }}" class="hover:text-primary-400 transition-colors duration-200">{{ $contactPhone }}</a></li>
                        @endif
                        @if($contactLocation)
                            <li>{{ $contactLocation }}</li>
                        @endif
                    </ul>
                </div>

                <!-- Social Links -->
                <div>
                    <h3 class="text-sm font-semibold text-white mb-4 uppercase tracking-wider">Connect</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach(\App\Models\SocialLink::allSafe() as $social)
                            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                               class="group h-10 w-10 rounded-xl bg-zinc-800 hover:bg-gradient-to-br hover:from-primary-500 hover:to-accent-500 flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg">
                                @if($social->icon_path)
                                    <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-5 w-5 object-contain filter brightness-0 invert group-hover:brightness-100">
                                @else
                                    <span class="text-xs font-semibold text-white">{{ \Illuminate\Support\Str::substr($social->platform,0,2) }}</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-zinc-700 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-zinc-400">
                <p>&copy; {{ date('Y') }} Abiya Makruf. All rights reserved.</p>
                <p class="text-xs">Built with <span class="text-red-500">♥</span> using Laravel & Tailwind CSS</p>
            </div>
        </div>
    </footer>
</body>
</html>
