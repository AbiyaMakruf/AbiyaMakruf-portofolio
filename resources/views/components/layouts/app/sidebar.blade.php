<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gradient-to-br from-[#F4FBFF] via-white to-[#E6FAF2] text-slate-800">
        <!-- Mobile Header with Hamburger -->
        <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white border-b border-slate-200 shadow-sm">
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
                
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-tight text-[#125C78]">
                    AM.
                </a>
                
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
            class="fixed top-0 bottom-0 left-0 z-50 w-72 bg-white border-e border-slate-100 shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 overflow-y-auto"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        >
            <div class="flex flex-col h-full p-6">
                <!-- Close button for mobile -->
                <button 
                    @click="sidebarOpen = false" 
                    class="lg:hidden self-end p-2 -mt-2 -mr-2 rounded-lg hover:bg-slate-100 transition-colors mb-4"
                    aria-label="Close menu"
                >
                    <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <a href="{{ route('admin.dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-xl font-bold tracking-tight text-[#125C78]">AM.</span>
                </a>

                <a href="{{ route('home') }}" target="_blank" class="mt-2 mb-4 inline-flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-[#125C78] hover:border-[#00B3DB] hover:text-[#00B3DB]">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    View Live Site
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group :heading="__('Platform')" class="grid text-slate-500">
                        <flux:navlist.item icon="home" :href="route('admin.dashboard')" :current="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</flux:navlist.item>
                        <flux:navlist.item icon="briefcase" :href="route('admin.projects.index')" :current="request()->routeIs('admin.projects.*')">{{ __('Projects') }}</flux:navlist.item>
                        <flux:navlist.item icon="code-bracket" :href="route('admin.skills.index')" :current="request()->routeIs('admin.skills.*')">{{ __('Skills') }}</flux:navlist.item>
                        <flux:navlist.item icon="academic-cap" :href="route('admin.experiences.index')" :current="request()->routeIs('admin.experiences.*')">{{ __('Career') }}</flux:navlist.item>
                        <flux:navlist.item icon="book-open" :href="route('admin.educations.index')" :current="request()->routeIs('admin.educations.*')">{{ __('Education') }}</flux:navlist.item>
                        <flux:navlist.item icon="pencil-square" :href="route('admin.activities.index')" :current="request()->routeIs('admin.activities.*')">{{ __('Activity') }}</flux:navlist.item>
                        <flux:navlist.item icon="trophy" :href="route('admin.achievements.index')" :current="request()->routeIs('admin.achievements.*')">{{ __('Achievements') }}</flux:navlist.item>
                        <flux:navlist.item icon="newspaper" :href="route('admin.publications.index')" :current="request()->routeIs('admin.publications.*')">{{ __('Publications') }}</flux:navlist.item>
                    </flux:navlist.group>

                    <flux:navlist.group :heading="__('Settings')" class="grid text-slate-500">
                        <flux:navlist.item icon="cog-6-tooth" :href="route('admin.settings.index')" :current="request()->routeIs('admin.settings.*')">{{ __('General Settings') }}</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>

                <div class="mt-auto pt-4"></div>

                <!-- User Profile Section - Now visible on both mobile and desktop -->
                <div class="border-t border-slate-200 pt-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 px-2 py-2 mb-2">
                        <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-lg bg-[#125C78] text-white">
                            <span class="flex h-full w-full items-center justify-center text-sm font-semibold">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>
                        <div class="grid flex-1 text-start text-sm leading-tight">
                            <span class="truncate font-semibold text-slate-800">{{ auth()->user()->name }}</span>
                            <span class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</span>
                        </div>
                    </div>

                    <!-- User Actions -->
                    <div class="space-y-1">
                        <a 
                            href="{{ route('admin.profile.edit') }}" 
                            class="flex items-center gap-2 px-3 py-2 text-sm text-slate-700 hover:bg-slate-100 rounded-lg transition-colors"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ __('Profile Settings') }}</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors"
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
