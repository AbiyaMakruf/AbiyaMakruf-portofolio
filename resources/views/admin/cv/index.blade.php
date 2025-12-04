<x-layouts.app title="CV / Resume">
    <div class="mx-auto max-w-3xl p-6 space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-[#00B3DB]">Documents</p>
                <h1 class="text-3xl font-bold text-[#125C78]">CV / Resume</h1>
                <p class="text-sm text-slate-500">Upload your latest CV to Google Cloud Storage.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-[#125C78] hover:text-[#0A7396]">&larr; Back</a>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-slate-100 bg-white/95 p-6 shadow-lg shadow-[#00B3DB]/10 space-y-4">
            <div class="space-y-2">
                <p class="text-sm font-semibold text-slate-700">Current CV</p>
                @if($latest)
                    <div class="flex flex-wrap items-center gap-3 text-sm text-slate-600">
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Updated {{ $latest->created_at->format('d M Y') }}</span>
                        @if($latest->public_url)
                            <a href="{{ $latest->public_url }}" target="_blank" class="text-[#00B3DB] hover:text-[#0A7396] font-semibold">View on GCS</a>
                        @endif
                    </div>
                @else
                    <p class="text-sm text-slate-500">No CV uploaded yet.</p>
                @endif
            </div>

            <form action="{{ route('admin.cv.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700">Upload New CV (PDF, max 5MB)</label>
                    <input type="file" name="cv" accept="application/pdf" required class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#CEF9FF] file:text-[#0A7396] hover:file:bg-[#00B3DB] hover:file:text-white">
                    @error('cv')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="rounded-lg bg-[#00B3DB] px-5 py-2 text-sm font-semibold text-white shadow hover:bg-[#0A7396]">Upload to GCS</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
