<x-layouts.app title="Admin Dashboard">
    <div class="flex h-full w-full flex-1 flex-col gap-8 rounded-xl p-6">
        
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Dashboard</h1>
                <p class="text-slate-500">Manage your portfolio content.</p>
            </div>
        </div>

        <!-- Stats / Quick Links Grid -->
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <!-- Projects Card -->
            <a href="{{ route('admin.projects.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-[#00B3DB] dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-[#CEF9FF] p-3 text-[#0A7396]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 dark:text-white">{{ \App\Models\Project::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Projects</h3>
                <p class="text-sm text-slate-500">Manage portfolio projects</p>
            </a>

            <!-- Skills Card -->
            <a href="{{ route('admin.skills.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-emerald-500 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-emerald-100 p-3 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 dark:text-white">{{ \App\Models\Skill::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Skills</h3>
                <p class="text-sm text-slate-500">Manage technical skills</p>
            </a>

            <!-- Achievements Card -->
            <a href="{{ route('admin.achievements.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-yellow-500 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-yellow-100 p-3 text-yellow-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 dark:text-white">{{ \App\Models\Achievement::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Achievements</h3>
                <p class="text-sm text-slate-500">Manage certifications & awards</p>
            </a>

            <!-- Activities Card -->
            <a href="{{ route('admin.activities.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-blue-500 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-blue-100 p-3 text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 dark:text-white">{{ \App\Models\Activity::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Activities</h3>
                <p class="text-sm text-slate-500">Manage posts & updates</p>
            </a>

            <!-- Career Card -->
            <a href="{{ route('admin.experiences.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-purple-500 dark:border-neutral-700 dark:bg-neutral-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-purple-100 p-3 text-purple-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900 dark:text-white">{{ \App\Models\Experience::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Career</h3>
                <p class="text-sm text-slate-500">Manage work experience</p>
            </a>

            <!-- CV / Resume Card -->
            <a href="{{ route('admin.cv.index') }}" class="group relative overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 transition hover:border-[#0A7396]">
                <div class="flex items-center justify-between mb-4">
                    <div class="rounded-lg bg-slate-100 p-3 text-[#0A7396]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657 1.343-3 3-3h4m0 0l-4-4m4 4l-4 4m-5 4H5a2 2 0 01-2-2V5a2 2 0 012-2h7m0 0v4a2 2 0 002 2h4m-6 6l-2 2m0 0l-2-2m2 2V9"></path></svg>
                    </div>
                    <span class="text-2xl font-bold text-slate-900">{{ \App\Models\CvFile::count() }}</span>
                </div>
                <h3 class="text-lg font-semibold text-slate-900">CV / Resume</h3>
                <p class="text-sm text-slate-500">Upload latest CV to GCS</p>
            </a>
        </div>

    </div>
</x-layouts.app>
