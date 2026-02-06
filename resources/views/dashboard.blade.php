{{-- resources/views/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobMaroc — Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          colors: {
            brand: {
              50:  '#ecfeff',
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
          },
          keyframes: {
            floaty: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-12px)' },
            },
            fadeUp: {
              '0%': { opacity: '0', transform: 'translateY(12px)' },
              '100%': { opacity: '1', transform: 'translateY(0px)' },
            },
            fadeDown: {
              '0%': { opacity: '0', transform: 'translateY(-10px)' },
              '100%': { opacity: '1', transform: 'translateY(0px)' },
            },
            pop: {
              '0%': { transform: 'scale(.96)', opacity: '0' },
              '100%': { transform: 'scale(1)', opacity: '1' },
            },
            shimmer: {
              '0%': { backgroundPosition: '0% 50%' },
              '100%': { backgroundPosition: '100% 50%' },
            }
          },
          animation: {
            floaty: 'floaty 8s ease-in-out infinite',
            fadeUp: 'fadeUp .6s ease-out both',
            fadeDown: 'fadeDown .5s ease-out both',
            pop: 'pop .35s ease-out both',
            shimmer: 'shimmer 6s ease-in-out infinite',
          }
        }
      }
    }
  </script>

  <style>
    html { scroll-behavior: smooth; }
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-thumb { background: rgba(15,23,42,.18); border-radius: 999px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(15,23,42,.28); }
    @media (prefers-reduced-motion: reduce) {
      * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
    }
  </style>

  @livewireStyles
</head>

<body class="min-h-screen font-sans antialiased text-slate-800
             bg-gradient-to-br from-slate-50 via-slate-100 to-cyan-50">

  {{-- Decorative blobs --}}
  <div class="pointer-events-none fixed inset-0 overflow-hidden">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-cyan-200/40 blur-3xl animate-floaty"></div>
    <div class="absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-indigo-200/30 blur-3xl animate-floaty" style="animation-delay: 1.5s;"></div>
    <div class="absolute top-1/3 left-1/2 h-64 w-64 -translate-x-1/2 rounded-full bg-emerald-200/20 blur-3xl animate-floaty" style="animation-delay: 3s;"></div>
  </div>

  {{-- Top Bar --}}
  <header class="sticky top-0 z-50 animate-fadeDown">
    <div class="backdrop-blur-xl bg-white/70 border-b border-white/60 shadow-[0_1px_0_rgba(15,23,42,.06)]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

        <a href="{{ url('/') }}" class="group flex items-center gap-3">
          <div class="relative">
            <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 shadow-soft flex items-center justify-center
                        transition duration-300 group-hover:scale-[1.03] group-hover:shadow-[0_18px_45px_rgba(2,6,23,.14)]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-emerald-500 ring-2 ring-white"></div>
          </div>

          <div class="leading-tight">
            <p class="text-lg font-extrabold tracking-tight text-ink-900">JobMaroc</p>
            <p class="text-[11px] text-slate-500 -mt-1">Dashboard</p>
          </div>
        </a>

        <div class="flex items-center gap-3">
          {{-- Profile chip --}}
          <a href="{{ route('profile.edit') }}" class="hidden md:block">
            <div class="flex items-center gap-3 rounded-2xl bg-white/70 border border-white/70 px-3 py-2 shadow-sm
                        transition hover:shadow-soft hover:-translate-y-[1px]">
              <div class="h-9 w-9 rounded-xl overflow-hidden border border-slate-200 bg-slate-100">
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="">
              </div>
              <div class="leading-tight">
                <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
              </div>
            </div>
          </a>

          {{-- Requests badge (visual only) --}}
          <div class="hidden sm:flex items-center gap-2 rounded-2xl bg-white/70 border border-white/60 px-3 py-2 shadow-sm">
            <i class="fa-regular fa-bell text-slate-600"></i>
            <span class="text-sm font-extrabold text-slate-900">{{ ($requests ?? collect())->count() }}</span>
          </div>

          {{-- Logout --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="group inline-flex items-center gap-2 rounded-2xl px-4 py-2 text-sm font-semibold
                           bg-gradient-to-r from-slate-900 to-slate-700 text-white shadow-soft
                           hover:opacity-95 active:scale-[0.99] transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:translate-x-[1px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
              </svg>
              Logout
            </button>
          </form>
        </div>

      </div>
    </div>
  </header>

  <main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

      {{-- LEFT --}}
      <aside class="lg:col-span-3 space-y-6">

        {{-- Search --}}
        <form action="{{ route('search')}}" method="GET" class="animate-fadeUp" style="animation-delay:.05s;">
          <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-4 shadow-soft
                      transition hover:-translate-y-[1px] hover:shadow-[0_18px_45px_rgba(2,6,23,.12)]">
            <div class="flex items-center gap-3 rounded-2xl px-4 py-3
                        bg-gradient-to-r from-slate-50 to-white
                        border border-slate-200
                        focus-within:border-cyan-400 focus-within:ring-4 focus-within:ring-cyan-200/50
                        transition">
              <input
                type="text"
                placeholder="Rechercher un utilisateur..."
                class="w-full bg-transparent outline-none text-slate-800 placeholder-slate-400" name="q"
              />
              <button type="submit" class="group rounded-xl flex items-center justify-center text-black shadow-sm px-2 py-2
                                           hover:bg-slate-50 active:scale-[0.98] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition group-hover:scale-[1.05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </div>
            <p class="mt-3 text-xs text-slate-500">Recherche par nom / email / pseudo.</p>
          </div>
        </form>

        {{-- Profile card --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl overflow-hidden shadow-soft animate-fadeUp" style="animation-delay:.12s;">

          <div class="relative h-28 overflow-hidden">
            <img src="{{ asset('storage/' . auth()->user()->banner_url) }}" class="w-full h-full object-cover transition duration-700 hover:scale-[1.03]" alt="">
            <div class="absolute inset-0 bg-gradient-to-t from-ink-900/40 via-ink-900/10 to-transparent"></div>
          </div>

          <div class="px-5 pb-5">
            <div class="-mt-10 flex items-end justify-between">
              <div class="flex items-end gap-3">
                <div class="relative w-20 h-20 rounded-3xl bg-white border border-white/70 shadow-soft overflow-hidden
                            transition hover:shadow-[0_18px_45px_rgba(2,6,23,.14)] hover:-translate-y-[1px]">
                  <img src="{{ asset('storage/' . auth()->user()->image_url) }}" class="w-full h-full object-cover" alt="">
                </div>
              </div>

              <div class="pb-1 ml-1 text-right">
                <p class="text-sm font-extrabold text-ink-900 leading-tight">{{ auth()->user()->name }}</p>
                <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
              </div>
            </div>

            <div class="mt-3 flex items-center justify-between gap-2">
              <a href="{{ route('profile.edit') }}"
                 class="group inline-flex items-center gap-2 rounded-2xl px-4 py-2 text-sm font-semibold
                        bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-soft
                        hover:opacity-95 active:scale-[0.99] transition">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit profile
              </a>

              <span class="inline-flex items-center gap-2 rounded-2xl px-3 py-2 text-xs font-bold
                           bg-white/70 border border-slate-200 text-slate-700">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                Online
              </span>
            </div>

            {{-- Stats (static as in your code) --}}
            <div class="mt-5 grid grid-cols-3 gap-2">
              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <i class="fa-regular fa-rectangle-list"></i>
                </div>
                <p class="text-xs text-slate-500">Posts</p>
                <p class="font-extrabold text-ink-900">12</p>
              </div>

              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <i class="fa-solid fa-user-group text-sm"></i>
                </div>
                <p class="text-xs text-slate-500">Friends</p>
                <p class="font-extrabold text-ink-900">34</p>
              </div>

              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <i class="fa-regular fa-eye"></i>
                </div>
                <p class="text-xs text-slate-500">Views</p>
                <p class="font-extrabold text-ink-900">128</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Quick actions --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.18s;">
          <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-900 text-white shadow-sm">
              <i class="fa-solid fa-bolt text-sm"></i>
            </span>
            Quick actions
          </h3>

          <div class="mt-4 space-y-2 text-sm">
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white
                      hover:bg-slate-50 hover:-translate-y-[1px] transition" href="#">
              <span class="font-semibold text-slate-700">Saved jobs</span>
              <span class="text-slate-400 group-hover:text-slate-600 transition">→</span>
            </a>
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white
                      hover:bg-slate-50 hover:-translate-y-[1px] transition" href="#">
              <span class="font-semibold text-slate-700">My applications</span>
              <span class="text-slate-400 group-hover:text-slate-600 transition">→</span>
            </a>
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white
                      hover:bg-slate-50 hover:-translate-y-[1px] transition" href="#">
              <span class="font-semibold text-slate-700">Settings</span>
              <span class="text-slate-400 group-hover:text-slate-600 transition">→</span>
            </a>
          </div>
        </div>

      </aside>

      {{-- MIDDLE --}}
      <section class="lg:col-span-6 space-y-6">

        {{-- Recruiter quick box (same functionality) --}}
        @if(auth()->user()->role === 'recruiter')
          <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.18s;">
            <div class="flex items-center justify-between gap-3">
              <div>
                <p class="text-sm font-extrabold text-slate-900">Espace recruteur</p>
                <p class="text-xs text-slate-500 mt-1">Créer et gérer vos offres.</p>
              </div>

              <span class="text-xs font-bold text-indigo-600 bg-indigo-50 border border-indigo-100 px-3 py-1 rounded-full">
                Recruiter
              </span>
            </div>

            <div class="mt-4 grid grid-cols-1 gap-3">
              <a href="{{ route('offre.new') }}"
                 class="group rounded-3xl border border-slate-200 bg-white p-4 transition hover:-translate-y-[1px] hover:shadow-md">
                <div class="flex items-start justify-between">
                  <div class="h-10 w-10 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center">
                    <i class="fa-regular fa-file-lines text-emerald-600"></i>
                  </div>

                  <span class="text-xs text-slate-400 group-hover:text-slate-500 transition">Offre</span>
                </div>

                <p class="mt-3 font-extrabold text-slate-900">Créer une offre</p>
                <p class="mt-1 text-sm text-slate-500">Publier une offre d’emploi avec tous les détails.</p>

                <div class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-emerald-600">
                  Aller à la création
                  <i class="fa-solid fa-arrow-right text-[12px]"></i>
                </div>
              </a>
            </div>
          </div>
        @endif

        {{-- Offres Infinite (same) --}}
        <livewire:offres-infinite />

      </section>

      {{-- RIGHT --}}
      <aside class="lg:col-span-3 space-y-6">

  {{-- Friend Requests (fixed layout) --}}
  <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.1s;">
    <div class="flex items-start justify-between gap-3">
      <div>
        <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
          <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 text-white shadow-sm">
            <i class="fa-solid fa-user-group text-sm"></i>
          </span>
          Friend Requests
        </h3>
        <p class="text-xs text-slate-500 mt-1">Demandes en attente</p>
      </div>

      <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-extrabold
                   bg-white/70 border border-slate-200 text-slate-700">
        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
        {{ ($requests ?? collect())->count() }}
      </span>
    </div>

    <div class="mt-4 space-y-3">
      @forelse(($requests ?? collect()) as $req)

        <div class="group rounded-3xl border border-slate-200/70 bg-white/60 p-3
            hover:bg-white/80 transition hover:shadow-[0_18px_45px_rgba(2,6,23,.10)]">

  {{-- Header --}}
  <div class="flex items-center justify-between gap-2">

    {{-- Left --}}
    <div class="flex items-center gap-2 min-w-0 flex-1">
      <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-700 text-white
                  flex items-center justify-center font-extrabold shadow-sm shrink-0 text-sm">
        {{ strtoupper(substr($req->sender->name ?? 'U', 0, 1)) }}
      </div>

      <div class="min-w-0 flex-1">
        <p class="text-sm font-extrabold text-ink-900 truncate leading-tight">
          {{ $req->sender->name }}
        </p>

        {{-- badges compact --}}
        <div class="mt-1 flex items-center gap-1.5 text-[11px] text-slate-600 min-w-0 flex-wrap">
          <span class="inline-flex items-center gap-1 rounded-full px-2 py-0.5
                       bg-slate-100 border border-slate-200">
            <i class="fa-regular fa-id-badge text-[10px]"></i>
            <span class="truncate max-w-[90px]">{{ $req->sender->role ?? 'user' }}</span>
          </span>

          <span class="inline-flex items-center gap-1 rounded-full px-2 py-0.5
                       bg-indigo-50 text-indigo-700 border border-indigo-100">
            <i class="fa-regular fa-clock text-[10px]"></i>
            {{ $req->created_at?->diffForHumans() ?? 'now' }}
          </span>
        </div>
      </div>
    </div>

    {{-- Right actions (smaller) --}}
    <div class="flex items-center gap-1.5 shrink-0">
      <form method="POST" action="{{ route('friend-requests.accept', $req->id) }}">
        @csrf
        @method('PATCH')
        <button title="Accepter"
                class="h-9 w-9 rounded-2xl grid place-items-center
                       bg-emerald-600 text-white shadow-sm
                       hover:opacity-95 focus:outline-none focus:ring-4 focus:ring-emerald-200/60
                       active:scale-[0.98] transition">
          <i class="fa-solid fa-check text-sm"></i>
        </button>
      </form>

      <form method="POST" action="{{ route('friend-requests.refuse', $req->id) }}">
        @csrf
        @method('PATCH')
        <button title="Refuser"
                class="h-9 w-9 rounded-2xl grid place-items-center
                       bg-rose-600 text-white shadow-sm
                       hover:opacity-95 focus:outline-none focus:ring-4 focus:ring-rose-200/60
                       active:scale-[0.98] transition">
          <i class="fa-solid fa-xmark text-sm"></i>
        </button>
      </form>
    </div>

  </div>

  {{-- Footer (compact) --}}
  <div class="mt-2 pt-2 border-t border-white/70 flex items-center justify-between text-[11px]">
    <span class="text-slate-500">Décide maintenant</span>
    <a href="{{ route('users.show', $req->sender_id) }}"
       class="inline-flex items-center gap-2 font-extrabold text-indigo-700 hover:text-indigo-800 transition">
      Voir profil
      <i class="fa-solid fa-arrow-right text-[10px]"></i>
    </a>
  </div>
</div>


      @empty
        <div class="rounded-3xl border border-dashed border-slate-200 bg-white/50 p-6 text-center">
          <div class="mx-auto h-12 w-12 rounded-2xl bg-slate-100 border border-slate-200 grid place-items-center text-slate-500">
            <i class="fa-regular fa-bell"></i>
          </div>
          <p class="mt-3 font-extrabold text-ink-900">Aucune demande</p>
          <p class="mt-1 text-sm text-slate-500">Quand quelqu’un t’ajoute, tu la verras ici.</p>
        </div>
      @endforelse
    </div>
  </div>

  {{-- Tips --}}
  <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.16s;">
    <div class="flex items-center justify-between">
      <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
        <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-900 text-white shadow-sm">
          <i class="fa-solid fa-lightbulb text-sm"></i>
        </span>
        Tips
      </h3>
      <span class="text-xs font-semibold text-slate-500">Boost</span>
    </div>

    <ul class="mt-4 space-y-3 text-sm">
      <li class="flex items-start gap-3">
        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-cyan-500"></span>
        <div>
          <p class="font-semibold text-slate-800">Complète ton profil</p>
          <p class="text-slate-500 text-xs mt-0.5">Photo, bio, expériences — plus de visibilité.</p>
        </div>
      </li>
      <li class="flex items-start gap-3">
        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-indigo-500"></span>
        <div>
          <p class="font-semibold text-slate-800">Ajoute tes skills</p>
          <p class="text-slate-500 text-xs mt-0.5">Aide les recruteurs à te trouver rapidement.</p>
        </div>
      </li>
      <li class="flex items-start gap-3">
        <span class="mt-1 h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
        <div>
          <p class="font-semibold text-slate-800">Explore les offres</p>
          <p class="text-slate-500 text-xs mt-0.5">Postule régulièrement pour augmenter tes chances.</p>
        </div>
      </li>
    </ul>
  </div>

</aside>

    </div>
  </main>

  @livewireScripts
</body>
</html>
