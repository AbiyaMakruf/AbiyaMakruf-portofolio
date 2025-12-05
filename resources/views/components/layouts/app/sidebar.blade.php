<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-800">
        <!-- Mobile Header with Hamburger -->
        <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200 shadow-sm backdrop-blur-xl bg-white/80">
            <div class="flex items-center justify-between px-4 h-16">
                <button 
                    @click="sidebarOpen = true" 
                    class="p-2 rounded-lg hover:bg-slate-100 transition-colors"
                    aria-label="Open menu"
                >
                    <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-sky-500 to-emerald-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AM</span>
                    </div>
                    <span class="font-bold text-slate-900">Admin Panel</span>
                </div>
                
                <div class="w-10"></div> <!-- Spacer for centering -->
            </div>
        </div>

        <!-- Mobile Sidebar Backdrop -->
        <div 
            x-show="sidebarOpen" 
            x-transition.opacity
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-black/50 z-40"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        <aside 
            class="fixed top-0 bottom-0 left-0 z-50 w-72 bg-white border-e border-slate-200 shadow-xl transform transition-transform duration-300 ease-in-out lg:translate-x-0 overflow-y-auto"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
            <div class="flex flex-col h-full">
                <!-- Header -->
                <div class="px-6 py-6 border-b border-slate-200">
                    <!-- Close button for mobile -->
                    <div class="flex items-center justify-between mb-4 lg:mb-0">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold">AM</span>
                            </div>
                            <div>
                                <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold text-slate-900 hover:text-sky-600 transition-colors">
                                    Abiya Makruf
                                </a>
                                <p class="text-xs text-slate-500">Admin Panel</p>
                            </div>
                        </div>
                        
                        <button 
                            @click="sidebarOpen = false" 
                            class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors"
                            aria-label="Close menu"
                        >
                            <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- View Live Site Button -->
                    <a href="{{ route('home') }}" target="_blank" 
                       class="hidden lg:flex items-center justify-center gap-2 mt-4 w-full rounded-xl border-2 border-dashed border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:border-sky-500 hover:text-sky-600 hover:bg-sky-50 transition-all duration-200">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                        View Live Site
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-6 space-y-8 overflow-y-auto">
                    <!-- Platform Section -->
                    <div>
                        <h3 class="px-3 mb-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Platform</h3>
                        <div class="space-y-1">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Dashboard
                            </a>
                            
                            <a href="{{ route('admin.projects.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.projects.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Projects
                            </a>
                            
                            <a href="{{ route('admin.skills.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.skills.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                                Skills
                            </a>
                            
                            <a href="{{ route('admin.experiences.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.experiences.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Career
                            </a>
                            
                            <a href="{{ route('admin.educations.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.educations.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                                </svg>
                                Education
                            </a>
                            
                            <a href="{{ route('admin.activities.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.activities.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Activity
                            </a>
                            
                            <a href="{{ route('admin.achievements.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.achievements.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                                Achievements
                            </a>
                            
                            <a href="{{ route('admin.publications.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.publications.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                                Publications
                            </a>
                        </div>
                    </div>

                    <!-- Settings Section -->
                    <div>
                        <h3 class="px-3 mb-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Settings</h3>
                        <div class="space-y-1">
                            <a href="{{ route('admin.settings.index') }}" 
                               class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-sky-500 to-emerald-500 text-white shadow-lg shadow-sky-500/30' : 'text-slate-700 hover:bg-slate-100' }}">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                General Settings
                            </a>
                        </div>
                    </div>
                </nav>

                <!-- User Profile Section -->
                <div class="border-t border-slate-200 p-4 bg-slate-50">
                    <div class="flex items-center gap-3 px-2 py-2 mb-2 rounded-xl">
                        <div class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-xl bg-gradient-to-br from-sky-500 to-emerald-500 text-white shadow-lg">
                            <span class="flex h-full w-full items-center justify-center text-sm font-bold">
                                {{ auth()->user()->initials() }}
                            </span>
                        </div>
                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold text-slate-900">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <a 
                            href="{{ route('admin.profile.edit') }}" 
                            class="flex items-center gap-2 px-3 py-2 text-sm text-slate-700 hover:bg-white rounded-xl transition-colors"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ __('Profile Settings') }}</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-xl transition-colors"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>{{ __('Log Out') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="lg:ml-72">
            <!-- Mobile top spacing -->
            <div class="h-16 lg:hidden"></div>
            
            {{ $slot }}
        </div>

        @fluxScripts
    </body>
</html>
