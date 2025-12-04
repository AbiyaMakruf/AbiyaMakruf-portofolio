<x-layouts.app title="Edit Project">
    <div class="mx-auto max-w-5xl p-6 space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Projects</p>
                <h1 class="text-3xl font-bold text-[#125C78]">Edit Project</h1>
                <p class="text-sm text-slate-500">Update copy, links, and gallery assets.</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-sm font-semibold text-[#125C78] hover:text-[#0A7396]">&larr; Back</a>
        </div>

        <div class="rounded-2xl border border-slate-100 bg-white/95 p-6 shadow-xl shadow-[#00B3DB]/10">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Project Title</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Category</label>
                            <input list="categories" name="category" value="{{ old('category', $project->category) }}" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]" placeholder="Select or type new...">
                            <datalist id="categories">
                                @foreach(\App\Models\Project::distinct()->pluck('category') as $cat)
                                    <option value="{{ $cat }}">
                                @endforeach
                                <option value="Web Development">
                                <option value="Mobile App">
                                <option value="AI & Machine Learning">
                                <option value="Cloud Infrastructure">
                                <option value="Data Analytics">
                            </datalist>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Status</label>
                            <select name="status" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                                <option value="draft" {{ $project->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $project->status == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Short Description</label>
                        <textarea name="short_description" rows="2" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">{{ old('short_description', $project->short_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Full Description</label>
                        <textarea name="full_description" rows="6" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">{{ old('full_description', $project->full_description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tech Stack (comma separated)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : $project->tech_stack) }}" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">GitHub URL</label>
                            <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Website URL</label>
                            <input type="url" name="website_url" value="{{ old('website_url', $project->website_url) }}" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Thumbnail Image</label>
                        @if($project->thumbnail_path)
                            <div class="flex items-center gap-3">
                                <img src="{{ $project->thumbnail_path }}" alt="Current Thumbnail" class="h-20 w-32 rounded-lg object-cover border border-slate-200">
                                <span class="text-xs text-slate-500">Uploading a new file will replace this thumbnail.</span>
                            </div>
                        @endif
                        <input type="file" name="thumbnail" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#CEF9FF] file:text-[#0A7396] hover:file:bg-[#00B3DB] hover:file:text-white">
                    </div>

                    <div x-data="{ items: [] }" class="space-y-4">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-semibold text-slate-700">Gallery Images</label>
                            <button type="button" @click="items.push({id: Date.now()})" class="text-sm font-semibold text-[#0A7396] hover:text-[#125C78]">+ Add Image</button>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            @foreach($project->images as $image)
                                <div class="relative rounded-xl border border-slate-100 bg-slate-50/60 p-3">
                                    <img src="{{ $image->image_path }}" class="mb-2 h-32 w-full rounded-lg object-cover">
                                    <input type="text" name="existing_gallery[{{ $image->id }}][caption]" value="{{ $image->caption }}" placeholder="Caption" class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                                    <label class="absolute right-3 top-3 flex cursor-pointer items-center gap-1 rounded-full bg-white/90 px-2 py-1 text-xs font-semibold text-red-600 shadow-sm">
                                        <input type="checkbox" name="delete_gallery[]" value="{{ $image->id }}"> Delete
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <template x-for="(item, index) in items" :key="item.id">
                            <div class="mb-3 flex flex-col gap-3 rounded-xl border border-slate-100 bg-slate-50/60 p-3 md:flex-row md:items-center">
                                <div class="flex-1">
                                    <input type="file" :name="'gallery['+index+'][image]'" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                                </div>
                                <div class="flex-1">
                                    <input type="text" :name="'gallery['+index+'][caption]'" placeholder="Caption" class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                                </div>
                                <button type="button" @click="items = items.filter(i => i.id !== item.id)" class="text-red-500 hover:text-red-700 md:px-2">&times;</button>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-6 py-3 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                        Update Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
