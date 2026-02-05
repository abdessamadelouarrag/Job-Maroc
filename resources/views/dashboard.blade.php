{{-- resources/views/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobMaroc — Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    /* Smooth scroll (optional) */
    html { scroll-behavior: smooth; }

    /* Nice scrollbar (optional) */
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-thumb { background: rgba(15,23,42,.18); border-radius: 999px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(15,23,42,.28); }

    /* Reduce motion preference */
    @media (prefers-reduced-motion: reduce) {
      * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
    }
  </style>
</head>

<body class="min-h-screen font-sans antialiased text-slate-800
             bg-gradient-to-br from-slate-50 via-slate-100 to-cyan-50">

  {{-- Decorative blobs (animated) --}}
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
          <a href="{{ route('profile.edit') }}">
            <div class="hidden md:flex items-center gap-3 rounded-2xl bg-white/70 border border-white/70 px-3 py-2 shadow-sm
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

      {{-- LEFT: Profile --}}
      <aside class="lg:col-span-3 space-y-6">

        {{-- Search (premium) --}}
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
          </div>
        </form>

        {{-- Profile card --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl overflow-hidden shadow-soft animate-fadeUp" style="animation-delay:.12s;">

          {{-- Banner (with overlay) --}}
          <div class="relative h-28 overflow-hidden">
            <img src="{{ asset('storage/' . auth()->user()->banner_url) }}" class="w-full h-full object-cover transition duration-700 hover:scale-[1.03]" alt="">
            <div class="absolute inset-0 bg-gradient-to-t from-ink-900/40 via-ink-900/10 to-transparent"></div>
          </div>

          <div class="px-5 pb-5">
            {{-- Avatar + info --}}
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

            <div>
              <a href="{{ route('profile.edit') }}"
                 class="group inline-flex items-center gap-1 rounded-2xl px-4 py-1 mt-3 text-sm font-semibold
                        bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-soft
                        hover:opacity-95 active:scale-[0.99] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition group-hover:rotate-[2deg]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
              </a>
            </div>

            {{-- Stats --}}
            <div class="mt-5 grid grid-cols-3 gap-2">
              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-6 4h10" />
                  </svg>
                </div>
                <p class="text-xs text-slate-500">Posts</p>
                <p class="font-extrabold text-ink-900">12</p>
              </div>

              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H2v-2a4 4 0 014-4h1m9-4a4 4 0 10-8 0 4 4 0 008 0z" />
                  </svg>
                </div>
                <p class="text-xs text-slate-500">Friends</p>
                <p class="font-extrabold text-ink-900">34</p>
              </div>

              <div class="group rounded-2xl border border-white/60 bg-white/60 p-3 text-center transition hover:-translate-y-[2px] hover:bg-white/75">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center transition group-hover:scale-[1.06]">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
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
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-900 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
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

      {{-- MIDDLE: Posts --}}
      <section class="lg:col-span-6 space-y-6">

        {{-- Create post --}}
<div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.18s;">
  <div class="flex items-center justify-between">
    <div>
      <p class="text-sm font-bold text-slate-900">Actions rapides</p>
      <p class="text-xs text-slate-500 mt-1">Accède</p>
    </div>

    <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-100 px-3 py-1 rounded-full">
      Recruiter
    </span>
  </div>

  <div class="mt-4 grid grid-cols-1 sm:grid-cols-1 gap-3">
    <!-- Optional: Create Job Offer (if you want) -->
    <a href=""
       class="group rounded-3xl border border-slate-200 bg-white p-4 transition hover:-translate-y-[1px] hover:shadow-md">
      <div class="flex items-start justify-between">
        <div class="h-10 w-10 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 10H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
          </svg>
        </div>

        <span class="text-xs text-slate-400 group-hover:text-slate-500 transition">Offre</span>
      </div>

      <p class="mt-3 font-semibold text-slate-900">Créer une offre</p>
      <p class="mt-1 text-sm text-slate-500">Publier une offre d’emploi avec les détails du poste.</p>

      <div class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-emerald-600">
        Aller à la création
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </div>
    </a>
  </div>
</div>

        {{-- Post 1 --}}
        <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-6 shadow-soft animate-fadeUp"
         style="animation-delay:.14s;">

  <!-- Recruiter / Company -->
  <div class="flex items-start justify-between">
    <div class="flex gap-3">
      <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white 
                  flex items-center justify-center font-extrabold shadow-sm">
        PS
      </div>
      <div>
        <p class="font-bold text-ink-900">ProxySoft</p>
        <p class="text-xs text-slate-500">Recruteur • Il y a 3h</p>
      </div>
    </div>

    <span class="text-xs px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 font-semibold">
      Offre active
    </span>
  </div>

  <!-- Job title -->
  <h2 class="mt-4 text-lg font-extrabold text-slate-900">
    Développeur Web Laravel (Stage)
  </h2>

  <!-- Job meta -->
  <div class="mt-2 flex flex-wrap gap-2 text-xs">
    <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">📍 Casablanca</span>
    <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">⏱️ Stage – 2 mois</span>
    <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-600">💻 Remote possible</span>
  </div>

  <!-- Description -->
  <p class="mt-4 text-sm text-slate-700 leading-relaxed">
    Nous recherchons un(e) stagiaire développeur(se) web passionné(e) par Laravel
    pour participer au développement de plateformes modernes orientées emploi et réseaux professionnels.
  </p>

  <!-- Skills -->
  <div class="mt-4 flex flex-wrap gap-2 text-xs">
    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 font-semibold">Laravel</span>
    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 font-semibold">PHP</span>
    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 font-semibold">Tailwind</span>
    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 font-semibold">PostgreSQL</span>
  </div>

  <!-- CTA -->
  <div class="mt-6 flex items-center justify-between">
    <p class="text-xs text-slate-500">
      Candidatures ouvertes jusqu’au 30 mars
    </p>

    <button
      class="inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl
             bg-gradient-to-r from-indigo-600 to-purple-600 text-white
             font-bold text-sm shadow-md hover:opacity-90 transition active:scale-[0.97]">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M14 5l7 7m0 0l-7 7m7-7H3"/>
      </svg>
      Postuler
    </button>
  </div>

</article>


        {{-- Post 2 --}}
        <!-- <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.2s;">
          <div class="flex items-start justify-between">
            <div class="flex gap-3">
              <div class="w-11 h-11 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-extrabold shadow-sm
                          transition hover:scale-[1.03]">YC</div>
              <div>
                <p class="font-bold text-ink-900">YouCode Community</p>
                <p class="text-xs text-slate-500">Hier • Public</p>
              </div>
            </div>
            <button class="h-9 w-9 rounded-2xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-50
                           transition active:scale-[0.98]">•••</button>
          </div>

          <p class="mt-4 text-slate-700 text-sm leading-relaxed">
            Astuce Laravel: organise tes views, utilise layouts, et garde ton code clean. (Post static)
          </p>

          <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
            <img
              class="w-full h-52 object-cover transition duration-700 hover:scale-[1.03]"
              src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1400&q=60"
              alt="workspace"
            >
          </div>

          <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>78 likes</span>
            <span>6 commentaires</span>
          </div>

          <div class="mt-4 pt-4 border-t border-white/60 flex gap-2">
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition active:scale-[0.99]">Like</button>
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition active:scale-[0.99]">Comment</button>
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition active:scale-[0.99]">Share</button>
          </div>
        </article> -->

      </section>

      {{-- RIGHT: Friends --}}
      <aside class="lg:col-span-3 space-y-6">

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.1s;">
          <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500 to-indigo-600 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H2v-2a4 4 0 014-4h1m9-4a4 4 0 10-8 0 4 4 0 008 0z" />
              </svg>
            </span>
            My friends
          </h3>
          <p class="text-sm text-slate-500 mt-1">Suggestions (static)</p>

          <div class="mt-4 space-y-3">

            @forelse($requests as $req)
        <div class="flex items-center justify-between gap-3 rounded-2xl border border-slate-200 bg-blue-300/40 px-3 py-3 hover:bg-blue-200 transition hover:-translate-y-[1px]">
          <div class="flex items-center gap-3">
            <div>
              <p class="text-sm font-bold text-ink-900">{{ $req->sender->name }}</p>
              <p class="text-xs text-slate-500">{{ $req->sender->role ?? 'user' }}</p>
            </div>
          </div>

          <div class="flex items-center gap-2">
            <form method="POST" action="{{ route('friend-requests.accept', $req->id) }}">
              @csrf
              @method('PATCH')
              <button class="group inline-flex items-center gap-2 px-3 py-2 rounded-2xl text-sm font-semibold
                             border border-slate-200 bg-green-600 transition active:scale-[0.99]">
                <i class="fa-solid fa-check text-white"></i>
              </button>
            </form>

            <form method="POST" action="{{ route('friend-requests.refuse', $req->id) }}">
              @csrf
              @method('PATCH')
              <button class="group inline-flex items-center gap-2 px-3 py-2 rounded-2xl text-sm font-semibold
                             border border-slate-200 bg-red-600 transition active:scale-[0.99]">
                <i class="fa-solid fa-x text-white"></i>
              </button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-sm text-slate-500">aucun demandes d'amis ...</p>
      @endforelse


          </div>
        </div>

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.16s;">
          <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-900 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
            </span>
            Tips
          </h3>
          <ul class="mt-3 text-sm text-slate-600 space-y-2">
            <li class="flex items-center gap-2">
              <span class="h-2 w-2 rounded-full bg-cyan-500"></span> Complète ton profil
            </li>
            <li class="flex items-center gap-2">
              <span class="h-2 w-2 rounded-full bg-indigo-500"></span> Ajoute ta spécialité
            </li>
            <li class="flex items-center gap-2">
              <span class="h-2 w-2 rounded-full bg-emerald-500"></span> Explore les offres
            </li>
          </ul>
        </div>

      </aside>

    </div>
  </main>

  <script>
    // Small micro-interactions: reveal on scroll (simple, no libs)
    (function () {
      const items = document.querySelectorAll('.reveal-on-scroll');
      if (!items.length) return;

      const io = new IntersectionObserver((entries) => {
        entries.forEach(e => {
          if (e.isIntersecting) {
            e.target.classList.add('animate-fadeUp');
            io.unobserve(e.target);
          }
        });
      }, { threshold: 0.12 });

      items.forEach(el => io.observe(el));
    })();
  </script>

  <!--
  @if(isset($usersearch) && $usersearch !== '')
    ...
  @endif
  -->

</body>
</html>
