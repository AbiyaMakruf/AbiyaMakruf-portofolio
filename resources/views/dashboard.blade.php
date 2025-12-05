<x-layouts.app title="Admin Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-8 p-4 sm:p-6 lg:p-8">
        
        <!-- Modern Header -->
        <div class="space-y-2 animate-fadeInUp">
            <div class="flex items-center gap-3">
                <div class="h-1 w-12 bg-gradient-to-r from-primary-500 to-accent-500 rounded-full"></div>
                <span class="text-sm font-semibold text-primary-600 uppercase tracking-wider">Admin Panel</span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-bold text-zinc-900 dark:text-white">Dashboard Overview</h1>
            <p class="text-zinc-600 dark:text-zinc-400">Manage and monitor your portfolio content</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Projects Card -->
            <a href="{{ route('admin.projects.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.1s;">
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary-500 to-primary-600 shadow-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-zinc-400 group-hover:text-primary-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400 mb-1">Projects</p>
                        <p class="text-3xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Project::count() }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                        <span class="text-zinc-500 dark:text-zinc-500">· View all projects</span>
                    </div>
                </div>
            </a>

            <!-- Skills Card -->
            <a href="{{ route('admin.skills.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.2s;">
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-accent-500 to-accent-600 shadow-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-zinc-400 group-hover:text-accent-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400 mb-1">Skills</p>
                        <p class="text-3xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Skill::count() }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                        <span class="text-zinc-500 dark:text-zinc-500">· Manage skills</span>
                    </div>
                </div>
            </a>

            <!-- Activities Card -->
            <a href="{{ route('admin.activities.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.3s;">
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-zinc-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400 mb-1">Activities</p>
                        <p class="text-3xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Activity::count() }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                        <span class="text-zinc-500 dark:text-zinc-500">· Blog posts</span>
                    </div>
                </div>
            </a>

            <!-- Career Card -->
            <a href="{{ route('admin.experiences.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.4s;">
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 shadow-lg flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-zinc-400 group-hover:text-purple-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-400 mb-1">Career</p>
                        <p class="text-3xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Experience::count() }}</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <span class="inline-flex items-center gap-1 text-emerald-600 dark:text-emerald-400">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                        <span class="text-zinc-500 dark:text-zinc-500">· Experience</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Secondary Cards Grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Education Card -->
            <a href="{{ route('admin.educations.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.5s;">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Education::count() }}</span>
                    </div>
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-white mb-1">Education</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Academic background</p>
                </div>
            </a>

            <!-- Achievements Card -->
            <a href="{{ route('admin.achievements.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.6s;">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-amber-100 dark:bg-amber-900/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Achievement::count() }}</span>
                    </div>
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-white mb-1">Achievements</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Certifications & awards</p>
                </div>
            </a>

            <!-- Publications Card -->
            <a href="{{ route('admin.publications.index') }}" 
               class="group card-modern hover:shadow-lifted animate-fadeInUp" style="animation-delay: 0.7s;">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-lg bg-orange-100 dark:bg-orange-900/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-zinc-900 dark:text-white">{{ \App\Models\Publication::count() }}</span>
                    </div>
                    <h3 class="text-base font-semibold text-zinc-900 dark:text-white mb-1">Publications</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Research papers</p>
                </div>
            </a>
        </div>

        <!-- Quick Actions -->
        <div class="card-modern animate-fadeInUp" style="animation-delay: 0.8s;">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-white mb-4">Quick Actions</h3>
                <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('admin.projects.create') }}" 
                       class="group flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-zinc-200 dark:border-zinc-700 hover:border-primary-500 hover:bg-primary-50 dark:hover:bg-primary-900/10 transition-all duration-200">
                        <div class="w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300 group-hover:text-primary-600 dark:group-hover:text-primary-400">New Project</span>
                    </a>
                    <a href="{{ route('admin.activities.create') }}" 
                       class="group flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-zinc-200 dark:border-zinc-700 hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-all duration-200">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300 group-hover:text-blue-600 dark:group-hover:text-blue-400">New Activity</span>
                    </a>
                    <a href="{{ route('admin.settings.index') }}" 
                       class="group flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-zinc-200 dark:border-zinc-700 hover:border-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-all duration-200">
                        <div class="w-10 h-10 rounded-lg bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center">
                            <svg class="w-5 h-5 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300 group-hover:text-zinc-900 dark:group-hover:text-white">Settings</span>
                    </a>
                    <a href="{{ route('home') }}" target="_blank"
                       class="group flex items-center gap-3 p-4 rounded-xl border-2 border-dashed border-zinc-200 dark:border-zinc-700 hover:border-accent-500 hover:bg-accent-50 dark:hover:bg-accent-900/10 transition-all duration-200">
                        <div class="w-10 h-10 rounded-lg bg-accent-100 dark:bg-accent-900/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent-600 dark:text-accent-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300 group-hover:text-accent-600 dark:group-hover:text-accent-400">View Site</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
