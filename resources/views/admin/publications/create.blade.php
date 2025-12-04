<x-layouts.app title="Add Publication">
    <div class="p-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Add Publication</h1>
                <p class="text-sm text-slate-500">Add publication details, DOI, and certificate/gallery images.</p>
            </div>
            <a href="{{ route('admin.publications.index') }}" class="text-sm text-[#125C78] hover:underline">Back</a>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <form action="{{ route('admin.publications.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Published At</label>
                        <input type="date" name="published_at" value="{{ old('published_at') }}" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('published_at') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">DOI URL</label>
                        <input type="url" name="doi_url" value="{{ old('doi_url') }}" placeholder="https://doi.org/..." class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('doi_url') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Certificate Image</label>
                        <input type="file" name="certificate_image" accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                        @error('certificate_image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
                    <textarea name="description" rows="4" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800">{{ old('description') }}</textarea>
                    @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-700">Gallery Images (upload multiple)</label>
                    <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm text-slate-800" />
                    @error('gallery_images.*') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-5 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                        Save Publication
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
