<x-layouts.app title="Edit Experience">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Experience</h1>
                <p class="text-sm text-slate-500">Update career, academic, or organisational experience details.</p>
            </div>
            <a href="{{ route('admin.experiences.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        @if(session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2800)" x-show="show" class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Company / Organization</label>
                        <input type="text" name="company" value="{{ old('company', $experience->company) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('company') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Role / Title</label>
                        <input type="text" name="role" value="{{ old('role', $experience->role) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('role') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Category</label>
                        <select name="category" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                            @foreach(['Professional', 'Academic', 'Program', 'Organizational'] as $option)
                                <option value="{{ $option }}" {{ old('category', $experience->category) === $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                        @error('category') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Location</label>
                        <input type="text" name="location" value="{{ old('location', $experience->location) }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('location') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Thumbnail (logo/company)</label>
                        @if($experience->thumbnail_path)
                            <div class="overflow-hidden rounded-lg border border-slate-200 bg-white dark:border-slate-700">
                                <img src="{{ $experience->thumbnail_path }}" alt="Thumbnail" class="h-28 w-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="thumbnail" accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('thumbnail') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('start_date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('end_date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Slug (optional)</label>
                        <input type="text" name="slug" value="{{ old('slug', $experience->slug) }}" placeholder="auto-generated if empty" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('slug') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Description</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('description', $experience->description) }}</textarea>
                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Highlights (one per line)</label>
                        <textarea name="highlights" rows="4" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('highlights', $experience->highlights ? implode("\n", $experience->highlights) : '') }}</textarea>
                        @error('highlights') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-3">
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Gallery Images</label>
                        @if($experience->gallery)
                            <div class="grid grid-cols-2 gap-3">
                                @foreach($experience->gallery as $image)
                                    <label class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700 relative block">
                                        <img src="{{ $image }}" alt="Gallery image" class="h-32 w-full object-cover">
                                        <input type="checkbox" name="delete_gallery[]" value="{{ $image }}" class="absolute top-2 left-2 h-4 w-4">
                                        <span class="absolute top-2 left-8 text-xs bg-white/80 px-2 py-0.5 rounded">Remove</span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                        <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        @error('gallery_images.*') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                        Update Experience
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
