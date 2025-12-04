<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Abiya Makruf - Portfolio' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#00B3DB] selection:text-white flex flex-col min-h-screen">
    
    <!-- Navbar -->
    <nav class="fixed top-0 z-50 w-full border-b border-white/10 bg-white/70 backdrop-blur-md transition-all">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-[#125C78]">
                AM.
            </a>
            <div class="hidden md:flex gap-6">
                <a href="{{ route('projects.index') }}" class="text-sm font-medium text-slate-600 hover:text-[#00B3DB] transition">Projects</a>
                <a href="{{ route('skills') }}" class="text-sm font-medium text-slate-600 hover:text-[#00B3DB] transition">Skill & Achievement</a>
                <a href="{{ route('career') }}" class="text-sm font-medium text-slate-600 hover:text-[#00B3DB] transition">Career</a>
                <a href="{{ route('activity') }}" class="text-sm font-medium text-slate-600 hover:text-[#00B3DB] transition">Activity</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('cv.download') }}" class="hidden md:inline-block rounded-full bg-[#0A7396] px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-[#0A7396]/20 transition hover:bg-[#125C78]">
                    Download CV
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hidden md:inline-block text-sm font-medium text-slate-600 hover:text-[#00B3DB]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-[#00B3DB]">Login</a>
                @endauth
            </div>
            <div class="flex items-center gap-2 md:hidden">
                <a href="{{ route('cv.download') }}" class="inline-flex items-center gap-2 rounded-full bg-[#0A7396] px-3 py-2 text-xs font-semibold text-white shadow-lg shadow-[#0A7396]/15 transition hover:bg-[#125C78]">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-4-4m4 4l4-4M4 18h16" /></svg>
                    Download CV
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-xs font-semibold text-slate-600 hover:text-[#00B3DB]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-slate-600 hover:text-[#00B3DB]">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Mobile Bottom Navbar -->
    <nav class="md:hidden fixed bottom-0 z-50 w-full border-t border-slate-200 bg-white/90 backdrop-blur-md pb-safe">
        <div class="grid grid-cols-5 h-16">
            <a href="{{ route('home') }}" class="flex flex-col items-center justify-center text-slate-500 hover:text-[#00B3DB] {{ request()->routeIs('home') ? 'text-[#00B3DB]' : '' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                <span class="text-[10px] mt-1">Home</span>
            </a>
            <a href="{{ route('projects.index') }}" class="flex flex-col items-center justify-center text-slate-500 hover:text-[#00B3DB] {{ request()->routeIs('projects.*') ? 'text-[#00B3DB]' : '' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                <span class="text-[10px] mt-1">Projects</span>
            </a>
            <a href="{{ route('skills') }}" class="flex flex-col items-center justify-center text-slate-500 hover:text-[#00B3DB] {{ request()->routeIs('skills') ? 'text-[#00B3DB]' : '' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                <span class="text-[10px] mt-1">Skill/Ach.</span>
            </a>
            <a href="{{ route('career') }}" class="flex flex-col items-center justify-center text-slate-500 hover:text-[#00B3DB] {{ request()->routeIs('career') ? 'text-[#00B3DB]' : '' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                <span class="text-[10px] mt-1">Career</span>
            </a>
            <a href="{{ route('activity') }}" class="flex flex-col items-center justify-center text-slate-500 hover:text-[#00B3DB] {{ request()->routeIs('activity') ? 'text-[#00B3DB]' : '' }}">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                <span class="text-[10px] mt-1">Activity</span>
            </a>
        </div>
    </nav>

    <main class="pt-16 flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white py-12 text-center text-sm text-slate-500 border-t border-slate-100 pb-24 md:pb-12">
        <div class="mx-auto max-w-7xl px-6">
            <div class="flex justify-center gap-6 mb-4">
                @foreach(\App\Models\SocialLink::allSafe() as $social)
                    <a href="{{ $social->url }}" target="_blank" class="text-slate-400 hover:text-[#00B3DB]">{{ $social->platform }}</a>
                @endforeach
            </div>
            <p>&copy; {{ date('Y') }} Abiya Makruf. Built with Laravel & Gemini.</p>
        </div>
    </footer>
</body>
</html>
