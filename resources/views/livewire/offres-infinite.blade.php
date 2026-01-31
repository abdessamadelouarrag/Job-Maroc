<div class="space-y-6">
  @forelse($offres as $offre)
  <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-6 shadow-soft animate-fadeUp">
    <div class="flex items-start justify-between">
      <div class="flex gap-3">
        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white
                      flex items-center justify-center font-extrabold shadow-sm">
          {{ strtoupper(substr($offre->title ?? 'OF', 0, 2)) }}
        </div>

        <div>
          <p class="font-bold text-slate-900">Recruteur</p>
          <p class="text-xs text-slate-500">{{ $offre->created_at?->diffForHumans() ?? 'à l’instant' }}</p>
        </div>
      </div>

      <span class="text-xs px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 font-semibold">
        Offre active
      </span>
    </div>

    @if(!empty($offre->image_offer))
    <div class="mt-4 overflow-hidden rounded-3xl border border-white/60 bg-white/60">
      <img src="{{ asset('storage/'.$offre->image_offer) }}" class="w-full h-44 object-cover" alt="">
    </div>
    @endif

    <h2 class="mt-4 text-lg font-extrabold text-slate-900">{{ $offre->title }}</h2>

    <div class="mt-2 flex flex-wrap gap-2 text-xs">
      <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600"> {{ $offre->place }}</span>
      <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600"> {{ strtoupper($offre->type_offer) }}</span>
      <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600"> {{ $offre->created_at?->format('d/m/Y') }}</span>
    </div>

    <p class="mt-4 text-sm text-slate-700 leading-relaxed">
      {{ \Illuminate\Support\Str::limit($offre->description, 180) }}
    </p>

    <div class="mt-6 flex items-center justify-end">

@if(auth()->check() && !in_array($offre->id, $appliedOffersIds))
    <form method="POST" action="{{ route('offres.postuler', $offre->id) }}">
      @csrf
      <button type="submit"
        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl
               bg-gradient-to-r from-indigo-600 to-purple-600 text-white
               font-bold text-sm shadow-md hover:opacity-90 transition active:scale-[0.97]">
        Postuler
      </button>
    </form>

  @else
    <button type="button" disabled
      class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl
             bg-emerald-100 text-emerald-700 border border-emerald-200
             font-bold text-sm cursor-not-allowed">
      <i class="fa-solid fa-check"></i>
      Déjà postulé
    </button>
  @endif

</div>


  </article>
  @empty
  <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-6 shadow-soft">
    <p class="text-sm text-slate-600">Aucune offre pour le moment.</p>
  </div>
  @endforelse

  {{-- Load more button --}}
  <div class="flex justify-center pt-2">
    <button
      wire:click="loadMore"
      class="rounded-2xl px-5 py-2 text-sm font-bold bg-white border border-slate-200 shadow-soft hover:bg-slate-50 transition">
      Load more
    </button>
  </div>
</div>