<div class="space-y-6">
  @foreach($offres as $offre)
    <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-6 shadow-soft">
      <h2 class="text-lg font-extrabold text-slate-900">{{ $offre->title }}</h2>

      <div class="mt-2 flex flex-wrap gap-2 text-xs">
        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">📍 {{ $offre->place }}</span>
        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">⏱️ {{ strtoupper($offre->type_offer) }}</span>
      </div>

      <p class="mt-4 text-sm text-slate-700 leading-relaxed">
        {{ \Illuminate\Support\Str::limit($offre->description, 180) }}
      </p>
    </article>
  @endforeach

  {{-- SENTINEL: ملي يوصل ليه scroll => يزيد 5 --}}
  @if($hasMore)
    <div
      class="h-10"
      x-data
      x-intersect.debounce.500ms="$wire.loadMore()"
    ></div>

    {{-- optional loader صغير --}}
    <div wire:loading wire:target="loadMore" class="text-center text-sm text-slate-500">
      Loading...
    </div>
  @endif

  <div x-data="{x: 1}">
  <span x-text="x"></span>
  <button @click="x++" class="border px-2">+</button>
</div>

</div>
