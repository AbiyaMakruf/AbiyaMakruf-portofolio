<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-accent-50 text-zinc-800 dark:bg-gradient-to-br dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-900 dark:text-white">
        <!-- Mobile Header with Hamburger -->
        <div class="lg:hidden fixed top-0 left-0 right-0 z-50 glass border-b border-white/20 shadow-elegant">
            <div class="flex items-center justify-between px-4 h-16">
                <button 
                    @click="sidebarOpen = true" 
                    class="p-2 rounded-xl hover:bg-white/50 dark:hover:bg-white/10 transition-all duration-200"
                    aria-label="Open menu"
                >
                    <svg class="w-6 h-6 text-zinc-700 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <div class="flex items-center gap-2">
                    <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shadow-lg">
                        <span class="text-white text-sm font-bold">AM</span>
                    </div>
                </div>
                
                <div class="w-10"></div>
            </div>
        </div>

        <!-- Mobile Sidebar Backdrop -->
        <div 
            x-show="sidebarOpen" 
            x-transition.opacity
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-40"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        <aside 
            class="fixed top-0 bottom-0 left-0 z-50 w-72 glass border-r border-white/20 shadow-premium transform transition-transform duration-300 ease-in-out lg:translate-x-0 overflow-y-auto"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
            <div class="flex flex-col h-full p-6">
                <!-- Close button for mobile -->
                <button 
                    @click="sidebarOpen = false" 
                    class="lg:hidden self-end p-2 -mt-2 -mr-2 rounded-xl hover:bg-white/50 dark:hover:bg-white/10 transition-all duration-200 mb-4"
                    aria-label="Close menu"
                >
                    <svg class="w-6 h-6 text-zinc-700 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 mb-6 group">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <span class="text-white text-base font-bold">AM</span>
                    </div>
                    <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">Abiya Makruf</span>
                </a>

                <!-- View Site Button -->
                <a href="{{ route('home') }}" target="_blank" class="mb-6 inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-accent-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        <polyline points="15 3 21 3 21 9"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                    View Live Site
                </a>

                <!-- Navigation -->
                <nav class="flex-1 space-y-6">
                    <!-- Platform Section -->
                    <div class="space-y-1">
                        <p class="px-3 text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">Platform</p>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.projects.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            Projects
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.skills.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Skills
                        </a>
                        <a href="{{ route('admin.experiences.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.experiences.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Career
                        </a>
                        <a href="{{ route('admin.educations.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.educations.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                            Education
                        </a>
                        <a href="{{ route('admin.activities.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.activities.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Activity
                        </a>
                        <a href="{{ route('admin.achievements.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.achievements.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            Achievements
                        </a>
                        <a href="{{ route('admin.publications.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.publications.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            Publications
                        </a>
                    </div>

                    <!-- Settings Section -->
                    <div class="space-y-1">
                        <p class="px-3 text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">Settings</p>
                        <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-primary-500 to-accent-500 text-white shadow-lg' : 'text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10' }}">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            General Settings
                        </a>
                    </div>
                </nav>

                <!-- User Profile Section -->
                <div class="border-t border-white/20 pt-4 mt-4">
                    <div class="flex items-center gap-3 px-2 py-2 mb-2">
                        <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-xl bg-gradient-to-br from-primary-500 to-accent-500 text-white shadow-lg">
                            <span class="flex h-full w-full items-center justify-center text-sm font-semibold">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>
                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold text-zinc-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs text-zinc-600 dark:text-zinc-400">{{ auth()->user()->email }}</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <a 
                            href="{{ route('admin.profile.edit') }}" 
                            class="flex items-center gap-2 px-3 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-white/50 dark:hover:bg-white/10 rounded-xl transition-all duration-200"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Profile Settings</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-all duration-200"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Log Out</span>
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
