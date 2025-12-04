<x-layouts.app title="Edit Skill">
    <div class="mx-auto max-w-3xl p-6 space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Skills</p>
                <h1 class="text-3xl font-bold text-[#125C78]">Edit Skill</h1>
                <p class="text-sm text-slate-500">Update the skill shown on your portfolio.</p>
            </div>
            <a href="{{ route('admin.skills.index') }}" class="text-sm font-semibold text-[#125C78] hover:text-[#0A7396]">&larr; Back</a>
        </div>

        <div class="rounded-2xl border border-slate-100 bg-white/95 p-6 shadow-xl shadow-[#00B3DB]/10">
            <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $skill->name) }}" required class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Category</label>
                    <input type="text" name="category" value="{{ old('category', $skill->category) }}" required class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    @error('category') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Level</label>
                        <input type="text" name="level" value="{{ old('level', $skill->level) }}" placeholder="Beginner / Intermediate / Advanced" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        @error('level') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Icon URL (optional)</label>
                        <input type="url" name="icon_path" value="{{ old('icon_path', $skill->icon_path) }}" class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        @error('icon_path') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-5 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                        Update Skill
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
