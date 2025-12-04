<x-layouts.app title="Edit Activity">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Edit Activity</h1>
                <p class="text-sm text-slate-500">Update activity, thumbnail, tags, and published time.</p>
            </div>
            <a href="{{ route('admin.activities.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
            <form action="{{ route('admin.activities.update', $activity) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Title</label>
                        <input type="text" name="title" value="{{ old('title', $activity->title) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Published At</label>
                        <input type="datetime-local" name="published_at" value="{{ old('published_at', $activity->published_at ? $activity->published_at->format('Y-m-d\TH:i') : '') }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('published_at') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Tags (comma or newline separated)</label>
                        <textarea name="tags" rows="2" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" placeholder="achievement, research">{{ old('tags', $activity->tags ? implode("\n", $activity->tags) : '') }}</textarea>
                        @error('tags') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Thumbnail</label>
                        @if($activity->thumbnail_path)
                            <div class="mb-2">
                                <img src="{{ $activity->thumbnail_path }}" alt="Current Thumbnail" class="h-20 w-20 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                            </div>
                        @endif
                        <input type="file" name="thumbnail" accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        @error('thumbnail') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Content</label>
                    <textarea name="content" rows="6" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('content', $activity->content) }}</textarea>
                    @error('content') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-3">
                    <label class="mb-1 block text-sm font-medium text-slate-700 dark:text-slate-200">Gallery Images</label>
                    @if($activity->gallery)
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($activity->gallery as $image)
                                <div class="overflow-hidden rounded-lg border border-slate-200 dark:border-slate-700">
                                    <img src="{{ $image }}" alt="Gallery image" class="h-32 w-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                    @error('gallery_images.*') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#125C78] px-4 py-2 text-sm font-semibold text-white hover:bg-[#0A7396]">
                        Update Activity
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
