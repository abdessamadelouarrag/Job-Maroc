{{-- resources/views/search/index.blade.php --}}
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobMaroc — Recherche</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          },
          colors: {
            brand: {
              50: '#ecfeff',
              100: '#cffafe',
              200: '#a5f3fc',
              500: '#06b6d4',
              600: '#0891b2',
              700: '#0e7490',
              900: '#164e63',
            },
            ink: {
              900: '#0b1220',
              800: '#111827',
              700: '#1f2937'
            }
          },
          boxShadow: {
            soft: '0 10px 30px rgba(2, 6, 23, 0.08)',
          }
        }
      }
    }
  </script>
</head>

<body class="min-h-screen font-sans antialiased text-slate-800
             bg-gradient-to-br from-slate-50 via-slate-100 to-cyan-50">

  {{-- Decorative blobs --}}
  <div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-cyan-200/40 blur-3xl"></div>
    <div class="absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-indigo-200/30 blur-3xl"></div>
  </div>

  {{-- Top Bar --}}
  <header class="sticky top-0 z-50">
    <div class="backdrop-blur-xl bg-white/70 border-b border-white/60 shadow-[0_1px_0_rgba(15,23,42,.06)]">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 shadow-soft flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <p class="text-lg font-extrabold tracking-tight text-ink-900">JobMaroc</p>
            <p class="text-[11px] text-slate-500 -mt-1">Recherche</p>
          </div>
        </a>

        <div class="flex items-center gap-2">
          <a href="{{ url('/dashboard') }}"
            class="inline-flex items-center gap-2 rounded-2xl px-4 py-2 text-sm font-semibold
                    border border-slate-200 bg-white/70 hover:bg-white transition">
            ← Retour
          </a>

          <div class="hidden sm:flex items-center gap-3 rounded-2xl bg-white/70 border border-white/70 px-3 py-2 shadow-sm">
            <div class="h-9 w-9 rounded-xl overflow-hidden border border-slate-200 bg-slate-100">
              <img class="w-full h-full object-cover" src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="">
            </div>
            <div class="leading-tight">
              <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
              <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>

  <main class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Search bar --}}
    <form action="{{ route('search') }}" method="GET" class="mb-6">
      <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-4 shadow-soft">
        <div class="flex items-center gap-3 rounded-2xl px-4 py-3
                    bg-gradient-to-r from-slate-50 to-white
                    border border-slate-200
                    focus-within:border-cyan-400 focus-within:ring-4 focus-within:ring-cyan-200/50 transition">

          <input
            type="text"
            name="q"
            value="{{ $usersearch ?? '' }}"
            placeholder="Rechercher un utilisateur (nom/email)..."
            class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400" />

          <button type="submit" class="h-10 w-10 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>

        </div>
      </div>
    </form>

    {{-- Header (like LinkedIn) --}}
    <div class="flex items-center justify-between mb-4">
      <div>
        <h2 class="text-xl font-extrabold text-ink-900">Personnes</h2>
        <p class="text-sm text-slate-500">
          @if(!empty($usersearch))
          Résultats pour “{{ $usersearch }}”
          @else
          Tape un mot-clé pour chercher.
          @endif
        </p>
      </div>

      <div class="hidden sm:flex items-center gap-2">
        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white/70 border border-slate-200">1er</span>
        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white/70 border border-slate-200">2e</span>
        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white/70 border border-slate-200">3e+</span>
        <span class="text-xs font-semibold px-3 py-1 rounded-full bg-white/70 border border-slate-200 flex items-center gap-2">
          <span class="inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
          Recrutement actif
        </span>
      </div>
    </div>

    {{-- Results list --}}
    <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl shadow-soft overflow-hidden">
      <div class="divide-y divide-slate-200/60">

        @forelse($users as $user)
        <div class="p-5 hover:bg-white/50 transition">
          <div class="flex items-center gap-4">

            {{-- Avatar --}}
            <div class="w-14 h-14 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 shrink-0">
              <a href="{{ route('users.show', $user->id)}}">
                <img src="{{ asset('storage/' . $user->image_url) }}" class="w-full h-full object-cover" alt="">
              </a>
            </div>

            {{-- Info --}}
            <div class="min-w-0 flex-1">
              <div class="flex items-center gap-2">
                <p class="font-extrabold text-ink-900 truncate">{{ $user->name }}</p>
                <span class="text-xs text-slate-500">•</span>
                <span class="text-xs text-slate-500 truncate">{{ $user->email }}</span>
              </div>
            </div>

            {{-- Action --}}
            <div class="shrink-0">
              @if(auth()->check() && auth()->id() !== $user->id)

  @php $exists = $existsMap[$user->id] ?? false; @endphp

  @if(!$exists)
    <form action="{{ route('friend-requests.store', $user->id) }}" method="POST">
      @csrf
      <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white">
        Se Connecter
      </button>
    </form>
  @else
    <button class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 cursor-not-allowed" disabled>
      Demande déjà envoyée / Déjà amis
    </button>
  @endif

@endif

            </div>


          </div>
        </div>
        @empty
        <div class="p-8 text-center">
          <p class="text-slate-600 font-semibold">Aucun résultat.</p>
          <p class="text-sm text-slate-500 mt-1">Essaie un autre mot-clé.</p>
        </div>
        @endforelse

      </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
      {{ $users->links() }}
    </div>

  </main>

</body>

</html>