<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-slate-50 text-slate-900 font-sans antialiased">
        <!-- Mobile Header with Hamburger -->
        <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200 shadow-sm">
            <div class="flex items-center justify-between px-4 h-16">
                <button 
                    @click="sidebarOpen = true" 
                    class="p-2 rounded-lg hover:bg-slate-100 text-slate-600 transition-colors"
                    aria-label="Open menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <span class="text-lg font-bold text-slate-900">Abiya Makruf</span>
                
                <div class="w-10"></div> <!-- Spacer for centering -->
            </div>
        </div>

        <!-- Mobile Sidebar Backdrop -->
        <div 
            x-show="sidebarOpen" 
            x-transition.opacity
            @click="sidebarOpen = false"
            class="lg:hidden fixed inset-0 bg-slate-900/50 z-40 backdrop-blur-sm"
            style="display: none;"
        ></div>

        <!-- Sidebar -->
        <aside 
            class="fixed top-0 bottom-0 left-0 z-50 w-72 bg-white border-r border-slate-200 shadow-xl lg:shadow-none transform transition-transform duration-300 ease-in-out lg:translate-x-0 overflow-y-auto"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
            <div class="flex flex-col h-full p-6">
                <!-- Close button for mobile -->
                <button 
                    @click="sidebarOpen = false" 
                    class="lg:hidden self-end p-2 -mt-2 -mr-2 rounded-lg hover:bg-slate-100 text-slate-500 transition-colors mb-4"
                    aria-label="Close menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="mb-8">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-600 text-white shadow-lg shadow-primary-600/20">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-lg font-bold tracking-tight text-slate-900">Abiya Makruf</span>
                            <span class="text-xs font-medium text-slate-500">Portfolio Admin</span>
                        </div>
                    </a>
                </div>

                <a href="{{ route('home') }}" target="_blank" class="mb-8 flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-600 transition-all hover:border-primary-200 hover:bg-primary-50 hover:text-primary-600 hover:shadow-sm">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    View Live Site
                </a>

                <flux:navlist variant="outline" class="space-y-1">
                    <flux:navlist.group :heading="__('Platform')" class="grid gap-1 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        <flux:navlist.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</flux:navlist.item>
                        <flux:navlist.item icon="briefcase" :href="route('admin.projects.index')" :current="request()->routeIs('admin.projects.*')">{{ __('Projects') }}</flux:navlist.item>
                        <flux:navlist.item icon="code-bracket" :href="route('admin.skills.index')" :current="request()->routeIs('admin.skills.*')">{{ __('Skills') }}</flux:navlist.item>
                        <flux:navlist.item icon="academic-cap" :href="route('admin.experiences.index')" :current="request()->routeIs('admin.experiences.*')">{{ __('Career') }}</flux:navlist.item>
                        <flux:navlist.item icon="book-open" :href="route('admin.educations.index')" :current="request()->routeIs('admin.educations.*')">{{ __('Education') }}</flux:navlist.item>
                        <flux:navlist.item icon="pencil-square" :href="route('admin.activities.index')" :current="request()->routeIs('admin.activities.*')">{{ __('Activity') }}</flux:navlist.item>
                        <flux:navlist.item icon="trophy" :href="route('admin.achievements.index')" :current="request()->routeIs('admin.achievements.*')">{{ __('Achievements') }}</flux:navlist.item>
                        <flux:navlist.item icon="newspaper" :href="route('admin.publications.index')" :current="request()->routeIs('admin.publications.*')">{{ __('Publications') }}</flux:navlist.item>
                    </flux:navlist.group>

                    <div class="my-4 border-t border-slate-100"></div>

                    <flux:navlist.group :heading="__('Settings')" class="grid gap-1 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                        <flux:navlist.item icon="cog-6-tooth" :href="route('admin.settings.index')" :current="request()->routeIs('admin.settings.*')">{{ __('General Settings') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

                <div class="mt-auto pt-6">
                    <div class="rounded-2xl bg-slate-50 p-4 border border-slate-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full bg-primary-600 text-white ring-2 ring-white">
                                <span class="flex h-full w-full items-center justify-center text-sm font-bold">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </div>
                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-bold text-slate-900">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                        <div class="grid gap-1">
                            <a 
                                href="{{ route('admin.profile.edit') }}" 
                                class="flex items-center gap-2 px-3 py-2 text-xs font-medium text-slate-600 hover:bg-white hover:text-primary-600 hover:shadow-sm rounded-lg transition-all"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-xs font-medium text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="lg:pl-72 pt-16 lg:pt-0 min-h-screen flex flex-col">
            <main class="flex-1 p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
        
        @fluxScripts
    </body>
</html>
