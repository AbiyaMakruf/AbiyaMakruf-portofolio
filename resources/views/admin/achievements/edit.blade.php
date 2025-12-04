<x-layouts.app title="Edit Achievement">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Achievement</h1>
                <p class="text-sm text-slate-500">Update achievement details.</p>
            </div>
            <a href="{{ route('admin.achievements.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Title</label>
                        <input type="text" name="title" value="{{ old('title', $achievement->title) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Date</label>
                        <input type="date" name="date" value="{{ old('date', $achievement->date ? $achievement->date->format('Y-m-d') : '') }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('date') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Certificate (optional)</label>
                        @if($achievement->certificate_url)
                            <div class="mb-2 text-sm">
                                <a href="{{ $achievement->certificate_url }}" target="_blank" class="text-[#00B3DB] hover:underline">View current certificate</a>
                            </div>
                        @endif
                        <input type="file" name="certificate" accept="image/*,.pdf" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        <p class="text-xs text-slate-500 mt-1">Upload to replace the existing certificate.</p>
                        @error('certificate') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Hero Image</label>
                        @if($achievement->image_path)
                            <div class="mb-2">
                                <img src="{{ $achievement->image_path }}" alt="Current Image" class="h-20 w-20 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('description', $achievement->description) }}</textarea>
                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-3">
                    <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Gallery Images</label>
                    @if($achievement->gallery)
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($achievement->gallery as $image)
                                <div class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700">
                                    <img src="{{ $image }}" alt="Gallery image" class="h-28 w-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                    @error('gallery_images.*') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                        Update Achievement
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
