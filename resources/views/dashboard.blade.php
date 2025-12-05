<x-layouts.app title="Admin Dashboard">
    <div class="flex flex-col gap-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Dashboard</h1>
                <p class="text-slate-500 mt-1">Welcome back, {{ auth()->user()->name }}. Here's what's happening.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 rounded-xl bg-white border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 hover:text-primary-600 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    View Site
                </a>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @php
                $stats = [
                    ['label' => 'Projects', 'count' => \App\Models\Project::count(), 'route' => 'admin.projects.index', 'icon' => 'briefcase', 'color' => 'text-blue-600', 'bg' => 'bg-blue-50'],
                    ['label' => 'Skills', 'count' => \App\Models\Skill::count(), 'route' => 'admin.skills.index', 'icon' => 'code-bracket', 'color' => 'text-emerald-600', 'bg' => 'bg-emerald-50'],
                    ['label' => 'Experience', 'count' => \App\Models\Experience::count(), 'route' => 'admin.experiences.index', 'icon' => 'academic-cap', 'color' => 'text-purple-600', 'bg' => 'bg-purple-50'],
                    ['label' => 'Activities', 'count' => \App\Models\Activity::count(), 'route' => 'admin.activities.index', 'icon' => 'pencil-square', 'color' => 'text-orange-600', 'bg' => 'bg-orange-50'],
                ];
            @endphp

            @foreach($stats as $stat)
                <a href="{{ route($stat['route']) }}" class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm border border-slate-100 transition-all hover:-translate-y-1 hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-slate-900 mt-2">{{ $stat['count'] }}</p>
                        </div>
                        <div class="rounded-xl {{ $stat['bg'] }} p-3 {{ $stat['color'] }}">
                            <flux:icon :name="$stat['icon']" class="w-6 h-6" />
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs font-medium text-slate-400 group-hover:text-primary-600 transition-colors">
                        Manage {{ strtolower($stat['label']) }} &rarr;
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Quick Actions / More Stats -->
        <div class="grid gap-6 md:grid-cols-3">
            <!-- Education -->
            <a href="{{ route('admin.educations.index') }}" class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm border border-slate-100 transition-all hover:border-primary-200 hover:shadow-md">
                <div class="rounded-xl bg-indigo-50 p-3 text-indigo-600">
                    <flux:icon name="book-open" class="w-6 h-6" />
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">Education</h3>
                    <p class="text-sm text-slate-500">{{ \App\Models\Education::count() }} entries</p>
                </div>
            </a>

            <!-- Achievements -->
            <a href="{{ route('admin.achievements.index') }}" class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm border border-slate-100 transition-all hover:border-primary-200 hover:shadow-md">
                <div class="rounded-xl bg-yellow-50 p-3 text-yellow-600">
                    <flux:icon name="trophy" class="w-6 h-6" />
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">Achievements</h3>
                    <p class="text-sm text-slate-500">{{ \App\Models\Achievement::count() }} awards</p>
                </div>
            </a>

            <!-- Publications -->
            <a href="{{ route('admin.publications.index') }}" class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm border border-slate-100 transition-all hover:border-primary-200 hover:shadow-md">
                <div class="rounded-xl bg-pink-50 p-3 text-pink-600">
                    <flux:icon name="newspaper" class="w-6 h-6" />
                </div>
                <div>
                    <h3 class="font-semibold text-slate-900">Publications</h3>
                    <p class="text-sm text-slate-500">{{ \App\Models\Publication::count() }} articles</p>
                </div>
            </a>
        </div>
        
        <!-- System Status / Info -->
        <div class="rounded-2xl bg-gradient-to-br from-slate-900 to-slate-800 p-8 text-white shadow-lg">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div>
                    <h3 class="text-xl font-bold">System Status</h3>
                    <p class="text-slate-300 mt-1">Your portfolio is live and running smoothly.</p>
                </div>
                <div class="flex gap-4">
                    <div class="text-center">
                        <span class="block text-2xl font-bold text-emerald-400">PHP {{ phpversion() }}</span>
                        <span class="text-xs text-slate-400">Version</span>
                    </div>
                    <div class="w-px bg-white/10"></div>
                    <div class="text-center">
                        <span class="block text-2xl font-bold text-blue-400">{{ app()->version() }}</span>
                        <span class="text-xs text-slate-400">Laravel</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
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
