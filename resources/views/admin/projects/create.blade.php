<x-layouts.app title="Create Project">
    <div class="mx-auto max-w-5xl p-6 space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Projects</p>
                <h1 class="text-3xl font-bold text-[#125C78]">Add New Project</h1>
                <p class="text-sm text-slate-500">Create a new case study with hero, details, and gallery.</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="text-sm font-semibold text-[#125C78] hover:text-[#0A7396]">&larr; Back</a>
        </div>

        <div class="rounded-2xl border border-slate-100 bg-white/95 p-6 shadow-xl shadow-[#00B3DB]/10">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Project Title</label>
                        <input type="text" name="title" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Category</label>
                            <input list="categories" name="category" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]" placeholder="Select or type new...">
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
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Short Description (Card Preview)</label>
                        <textarea name="short_description" rows="2" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 flex items-center justify-between gap-2">
                            <span>Full Description (Markdown supported)</span>
                            <button type="button" id="beautify-full-desc-create" class="inline-flex items-center gap-1 rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-[#0A7396] hover:border-[#00B3DB] hover:text-[#00B3DB] transition">
                                Beautify with AI
                            </button>
                        </label>
                        <textarea name="full_description" id="full_description_create" rows="8" required class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]"></textarea>
                        <p class="mt-1 text-xs text-slate-500">Gunakan markdown untuk list, heading, dan link agar tampilan lebih rapi.</p>
                        <p id="beautify-status-create" class="mt-1 text-xs text-slate-500 hidden"></p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Tech Stack (comma separated)</label>
                        <input type="text" name="tech_stack" placeholder="Laravel, Vue, Tailwind, Docker" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">GitHub URL</label>
                            <input type="url" name="github_url" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Website URL</label>
                            <input type="url" name="website_url" class="mt-2 block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Thumbnail Image</label>
                        <input type="file" name="thumbnail" accept="image/*" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#CEF9FF] file:text-[#0A7396] hover:file:bg-[#00B3DB] hover:file:text-white">
                    </div>

                    <div x-data="{ items: [{id: 1}] }">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Gallery Images</label>
                            <button type="button" @click="items.push({id: Date.now()})" class="text-sm font-semibold text-[#0A7396] hover:text-[#125C78]">+ Add Image</button>
                        </div>
                        
                        <template x-for="(item, index) in items" :key="item.id">
                            <div class="mb-3 flex flex-col gap-3 rounded-xl border border-slate-100 bg-slate-50/60 p-3 md:flex-row md:items-center">
                                <div class="flex-1">
                                    <input type="file" :name="'gallery['+index+'][image]'" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                                </div>
                                <div class="flex-1">
                                    <input type="text" :name="'gallery['+index+'][caption]'" placeholder="Caption" class="block w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 shadow-sm focus:border-[#00B3DB] focus:ring-[#00B3DB]">
                                </div>
                                <button type="button" @click="items = items.filter(i => i.id !== item.id)" class="text-red-500 hover:text-red-700 md:px-2" x-show="items.length > 1">
                                    &times;
                                </button>
                            </div>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700">Videos (upload multiple)</label>
                        <input type="file" name="videos[]" multiple accept="video/mp4,video/webm,video/ogg" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                        <p class="text-xs text-slate-500 mt-1">Max 20MB per video.</p>
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-6 py-3 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">
                        Save Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('beautify-full-desc-create');
    const field = document.getElementById('full_description_create');
    const status = document.getElementById('beautify-status-create');
    if (!btn || !field || !status) return;

    const defaultLabel = btn.innerHTML;
    const setStatus = (msg, tone = 'muted') => {
        status.classList.remove('hidden', 'text-red-600', 'text-green-600');
        status.classList.add(tone === 'error' ? 'text-red-600' : (tone === 'success' ? 'text-green-600' : 'text-slate-500'));
        status.textContent = msg;
    };

    btn.addEventListener('click', async () => {
        const text = field.value.trim();
        if (!text) {
            setStatus('Isi dahulu deskripsi sebelum dibantu AI.', 'error');
            return;
        }
        btn.disabled = true;
        btn.innerHTML = '<svg class="w-4 h-4 animate-spin text-[#0A7396]" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span> Beautifying...</span>';
        setStatus('Meminta AI merapikan deskripsi...', 'muted');
        try {
            const res = await fetch('{{ route('admin.projects.beautify') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ text })
            });
            const data = await res.json();
            if (res.ok && data.markdown) {
                field.value = data.markdown;
                setStatus('Berhasil! Teks sudah dirapikan.', 'success');
            } else {
                setStatus(data.error || 'Gagal memproses teks dengan AI.', 'error');
            }
        } catch (err) {
            setStatus('Terjadi kesalahan saat menghubungi AI.', 'error');
        } finally {
            btn.disabled = false;
            btn.innerHTML = defaultLabel;
        }
    });
});
</script>
