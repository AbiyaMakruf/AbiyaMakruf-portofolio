<x-layouts.app title="Edit Publication">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Edit Publication</h1>
                <p class="text-sm text-slate-500">Update publication details, DOI, and images.</p>
            </div>
            <a href="{{ route('admin.publications.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <form action="{{ route('admin.publications.update', $publication) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $publication->title) }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Published At</label>
                        <input type="date" name="published_at" value="{{ old('published_at', $publication->published_at?->format('Y-m-d')) }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('published_at') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">DOI URL</label>
                        <input type="url" name="doi_url" value="{{ old('doi_url', $publication->doi_url) }}" placeholder="https://doi.org/..." class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('doi_url') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Certificate Image</label>
                        @if($publication->certificate_image_path)
                            <div class="mb-2">
                                <img src="{{ $publication->certificate_image_path }}" alt="Certificate" class="h-20 w-20 rounded-lg object-cover border border-slate-200">
                            </div>
                        @endif
                        <input type="file" name="certificate_image" accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('certificate_image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800">{{ old('description', $publication->description) }}</textarea>
                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-3">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Gallery Images</label>
                    @if($publication->gallery)
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($publication->gallery as $image)
                                <label class="overflow-hidden rounded-lg border border-slate-200 relative block">
                                    <img src="{{ $image }}" alt="Gallery image" class="h-28 w-full object-cover">
                                    <input type="checkbox" name="delete_gallery[]" value="{{ $image }}" class="absolute top-2 left-2 h-4 w-4">
                                    <span class="absolute top-2 left-8 text-xs bg-white/80 px-2 py-0.5 rounded">Remove</span>
                                </label>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                    @error('gallery_images.*') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-5 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                        Update Publication
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
