<x-layouts.app title="Profile, Socials & Settings">
    <div class="p-6 space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Profile & Settings</p>
                <h1 class="text-3xl font-bold text-[#125C78]">Profile, Socials & General Settings</h1>
                <p class="text-sm text-slate-500">Manage your social links and site metadata in one place.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 lg:grid-cols-3">
            <!-- Social Links -->
            <div class="lg:col-span-2 rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Social Links</h2>
                        <p class="text-sm text-slate-500">Links displayed on your site.</p>
                    </div>
                    <form action="{{ route('admin.socials.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3 md:flex-row md:items-center">
                        @csrf
                        <input type="text" name="platform" placeholder="Platform" required class="rounded-lg border border-slate-200 px-3 py-2 text-sm w-full md:w-auto" />
                        <input type="url" name="url" placeholder="https://..." required class="rounded-lg border border-slate-200 px-3 py-2 text-sm w-full md:w-auto" />
                        <input type="text" name="icon_class" placeholder="Icon class (optional)" class="rounded-lg border border-slate-200 px-3 py-2 text-sm w-full md:w-auto" />
                        <input type="file" name="icon" accept="image/*" class="rounded-lg border border-slate-200 px-3 py-2 text-sm w-full md:w-auto" />
                        <button type="submit" class="rounded-lg bg-[#00B3DB] px-3 py-2 text-sm font-semibold text-white hover:bg-[#0A7396] w-full md:w-auto">Add</button>
                    </form>
                </div>

                <div class="overflow-hidden rounded-xl border border-slate-100">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[720px] text-left text-sm text-slate-700">
                            <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                                <tr>
                                    <th class="px-4 py-3">Platform</th>
                                    <th class="px-4 py-3">URL</th>
                                    <th class="px-4 py-3">Icon</th>
                                    <th class="px-4 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($socials as $social)
                                    <tr class="hover:bg-slate-50/70">
                                        <td class="px-4 py-3 font-medium text-slate-900">{{ $social->platform }}</td>
                                        <td class="px-4 py-3 text-slate-600">
                                            <a href="{{ $social->url }}" target="_blank" class="text-[#00B3DB] hover:text-[#0A7396]">{{ $social->url }}</a>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($social->icon_path)
                                                <img src="{{ $social->icon_path }}" alt="{{ $social->platform }}" class="h-8 w-8 rounded-lg object-contain border border-slate-200">
                                            @elseif($social->icon_class)
                                                <span class="{{ $social->icon_class }}"></span>
                                            @else
                                                <span class="text-xs text-slate-400">—</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <form action="{{ route('admin.socials.destroy', $social->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-confirm="Delete this link?" class="text-red-600 hover:text-red-800 text-sm font-semibold">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-slate-500">No social links added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- General Settings -->
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-slate-900 mb-1">General Settings</h2>
                <p class="text-sm text-slate-500 mb-4">Homepage tagline and contact details.</p>

                <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Website Tagline</label>
                        <input type="text" name="tagline" value="{{ $settings['tagline'] ?? '' }}" placeholder="e.g., Full Stack Developer & AI Enthusiast" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                        <p class="text-xs text-slate-500 mt-1">Shown on the hero section.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Contact Email (Personal)</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" placeholder="personal@example.com" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Contact Email (University)</label>
                        <input type="email" name="contact_email_university" value="{{ $settings['contact_email_university'] ?? '' }}" placeholder="student@university.ac.id" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Phone Number</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" placeholder="+62 xxx" class="mt-2 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                    </div>
                    <div class="border-t border-slate-100 pt-4">
                        <h3 class="text-sm font-semibold text-slate-700 mb-2">About Me</h3>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm text-slate-700">Name</label>
                                <input type="text" name="about_name" value="{{ $settings['about_name'] ?? '' }}" placeholder="Your name" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                            </div>
                            <div>
                                <label class="block text-sm text-slate-700">Headline / Short Description</label>
                                <textarea name="about_description" rows="3" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm">{{ $settings['about_description'] ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm text-slate-700">Profile Photo</label>
                                @if(!empty($settings['about_photo_url']))
                                    <div class="mb-2 flex items-center gap-3">
                                        <img src="{{ $settings['about_photo_url'] }}" alt="Current profile" class="h-12 w-12 rounded-lg object-cover border border-slate-200">
                                        <a href="{{ $settings['about_photo_url'] }}" target="_blank" class="text-[#00B3DB] text-sm hover:underline">View current photo</a>
                                    </div>
                                @endif
                                <input type="file" name="about_photo" accept="image/*" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                                <p class="text-xs text-slate-500 mt-1">Upload to replace; the public link is stored automatically.</p>
                            </div>
                            <div>
                                <label class="block text-sm text-slate-700">Location / Domisili</label>
                                <input type="text" name="contact_location" value="{{ $settings['contact_location'] ?? '' }}" placeholder="Bandung, Indonesia" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="rounded-lg bg-[#00B3DB] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
