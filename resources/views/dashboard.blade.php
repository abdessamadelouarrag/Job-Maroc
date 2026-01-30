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
              500: '#06b6d4',  // cyan
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
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
          <div class="relative">
            <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 shadow-soft flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div class="absolute -bottom-1 -right-1 h-4 w-4 rounded-full bg-emerald-500 ring-2 ring-white"></div>
          </div>

          <div>
            <p class="text-lg font-extrabold tracking-tight text-ink-900">JobMaroc</p>
            <p class="text-[11px] text-slate-500 -mt-1">Dashboard</p>
          </div>
        </a>

        <div class="flex items-center gap-3">
          <div class="hidden md:flex items-center gap-3 rounded-2xl bg-white/70 border border-white/70 px-3 py-2 shadow-sm">
            <div class="h-9 w-9 rounded-xl overflow-hidden border border-slate-200 bg-slate-100">
              <img class="w-full h-full object-cover" src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="">
            </div>
            <div class="leading-tight">
              <p class="text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
              <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
            </div>
          </div>

          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="inline-flex items-center gap-2 rounded-2xl px-4 py-2 text-sm font-semibold
                           bg-gradient-to-r from-slate-900 to-slate-700 text-white shadow-soft
                           hover:opacity-95 active:scale-[0.99] transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        <form action="{{ route('search')}}" method="GET">
          <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-4 shadow-soft">
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

            <button>
          <div class="rounded-xl flex items-center justify-center text-black shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
        </button>
          </div>
        </div>
        </form>

        {{-- Profile card --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl overflow-hidden shadow-soft">

          {{-- Banner (with overlay) --}}
          <div class="relative h-28 overflow-hidden">
            <img src="{{ asset('storage/' . auth()->user()->banner_url) }}" class="w-full h-full object-cover" alt="">
            <div class="absolute inset-0 bg-gradient-to-t from-ink-900/40 via-ink-900/10 to-transparent"></div>
          </div>

          <div class="px-5 pb-5">
            {{-- Avatar + edit --}}
            <div class="-mt-10 flex items-end justify-between">
              <div class="flex items-end gap-3">
                <div class="relative w-20 h-20 rounded-3xl bg-white border border-white/70 shadow-soft overflow-hidden">
                  <img src="{{ asset('storage/' . auth()->user()->image_url) }}" class="w-full h-full object-cover" alt="">
                </div>
              </div>

              <div class="pb-1 ml-1">
                  <p class="text-sm font-extrabold text-ink-900 leading-tight">{{ auth()->user()->name }}</p>
                  <p class="text-xs text-slate-400">{{ auth()->user()->email }}</p>
              </div>
              
            </div>
            <div>
              <a href="{{ route('profile.edit') }}"
                 class="inline-flex items-center gap-1 rounded-2xl px-4 py-1 mt-3 text-sm font-semibold
                        bg-gradient-to-r from-cyan-500 to-indigo-600 text-white shadow-soft
                        hover:opacity-95 active:scale-[0.99] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
              </a>
            </div>

            {{-- Stats --}}
            <div class="mt-5 grid grid-cols-3 gap-2">
              <div class="rounded-2xl border border-white/60 bg-white/60 p-3 text-center">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-6 4h10" />
                  </svg>
                </div>
                <p class="text-xs text-slate-500">Posts</p>
                <p class="font-extrabold text-ink-900">12</p>
              </div>

              <div class="rounded-2xl border border-white/60 bg-white/60 p-3 text-center">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H2v-2a4 4 0 014-4h1m9-4a4 4 0 10-8 0 4 4 0 008 0z" />
                  </svg>
                </div>
                <p class="text-xs text-slate-500">Friends</p>
                <p class="font-extrabold text-ink-900">34</p>
              </div>

              <div class="rounded-2xl border border-white/60 bg-white/60 p-3 text-center">
                <div class="mx-auto mb-1 h-9 w-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
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
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
          <h3 class="font-extrabold text-ink-900 flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-slate-900 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
            </span>
            Quick actions
          </h3>

          <div class="mt-4 space-y-2 text-sm">
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white hover:bg-slate-50 transition" href="#">
              <span class="font-semibold text-slate-700">Saved jobs</span>
              <span class="text-slate-400 group-hover:text-slate-600">→</span>
            </a>
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white hover:bg-slate-50 transition" href="#">
              <span class="font-semibold text-slate-700">My applications</span>
              <span class="text-slate-400 group-hover:text-slate-600">→</span>
            </a>
            <a class="group flex items-center justify-between rounded-2xl px-3 py-3 border border-slate-200 bg-white hover:bg-slate-50 transition" href="#">
              <span class="font-semibold text-slate-700">Settings</span>
              <span class="text-slate-400 group-hover:text-slate-600">→</span>
            </a>
          </div>
        </div>

      </aside>

      {{-- MIDDLE: Posts --}}
      <section class="lg:col-span-6 space-y-6">

        {{-- Create post --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
          <div class="flex gap-3">
            <div class="w-11 h-11 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100">
              <img class="w-full h-full object-cover" src="{{ asset('storage/' . auth()->user()->image_url) }}" alt="">
            </div>

            <div class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-500">
              Partager quelque chose… (static)
            </div>
          </div>

          <div class="mt-4 grid grid-cols-3 gap-2">
            <button disabled class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl border border-slate-200 bg-white text-sm text-slate-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2-2h6l2 2h4v12H3V7z" />
              </svg>
              Photo
            </button>
            <button disabled class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl border border-slate-200 bg-white text-sm text-slate-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0l-4-4m4 4l-4 4" />
              </svg>
              Article
            </button>
            <button disabled class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl border border-slate-200 bg-white text-sm text-slate-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 10H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
              </svg>
              Job
            </button>
          </div>
        </div>

        {{-- Post 1 --}}
        <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="flex gap-3">
              <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 text-white flex items-center justify-center font-extrabold shadow-sm">JM</div>
              <div>
                <p class="font-bold text-ink-900">Admin JobMaroc</p>
                <p class="text-xs text-slate-500">Il y a 2h • Public</p>
              </div>
            </div>
            <button class="h-9 w-9 rounded-2xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-50">•••</button>
          </div>

          <p class="mt-4 text-slate-700 text-sm leading-relaxed">
            Nouvelle fonctionnalité : recherche par spécialité + profils améliorés. 🚀 (Post static)
          </p>

          {{-- Realistic image (static) --}}
          <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
            <img
              class="w-full h-52 object-cover"
              src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1400&q=60"
              alt="team"
            >
          </div>

          <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>124 likes</span>
            <span>18 commentaires</span>
          </div>

          <div class="mt-4 pt-4 border-t border-white/60 flex gap-2">
            <button class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2-2-2 2m0 0v10m0-10H7a4 4 0 00-4 4v1a4 4 0 004 4h1" />
              </svg>
              Like
            </button>
            <button class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h8m-8 4h6m-4 6h6a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h2z" />
              </svg>
              Comment
            </button>
            <button class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8.684 13.342C9.886 14.535 11.504 15 13.4 15c1.724 0 3.22-.4 4.395-1.267M15 10h.01M9 10h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
              </svg>
              Share
            </button>
          </div>
        </article>

        {{-- Post 2 --}}
        <article class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="flex gap-3">
              <div class="w-11 h-11 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-extrabold shadow-sm">YC</div>
              <div>
                <p class="font-bold text-ink-900">YouCode Community</p>
                <p class="text-xs text-slate-500">Hier • Public</p>
              </div>
            </div>
            <button class="h-9 w-9 rounded-2xl border border-slate-200 bg-white text-slate-500 hover:bg-slate-50">•••</button>
          </div>

          <p class="mt-4 text-slate-700 text-sm leading-relaxed">
            Astuce Laravel: organise tes views, utilise layouts, et garde ton code clean. ✅ (Post static)
          </p>

          <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
            <img
              class="w-full h-52 object-cover"
              src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1400&q=60"
              alt="workspace"
            >
          </div>

          <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>78 likes</span>
            <span>6 commentaires</span>
          </div>

          <div class="mt-4 pt-4 border-t border-white/60 flex gap-2">
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">Like</button>
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">Comment</button>
            <button class="flex-1 px-3 py-2 rounded-2xl hover:bg-white/60 text-sm font-semibold text-slate-700 transition">Share</button>
          </div>
        </article>

      </section>

      {{-- RIGHT: Friends --}}
      <aside class="lg:col-span-3 space-y-6">

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
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

              <div class="flex items-center justify-between gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-3 hover:bg-slate-50 transition">
                <div class="flex items-center gap-3">
                  <div class="w-11 h-11 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 flex items-center justify-center font-extrabold text-slate-700">
                  </div>
                  <div>
                    <p class="text-sm font-bold text-ink-900">name</p>
                    <p class="text-xs text-slate-500">role</p>
                  </div>
                </div>
                <button class="inline-flex items-center gap-2 px-3 py-2 rounded-2xl text-sm font-semibold
                               border border-slate-200 bg-white hover:bg-slate-50 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  Add
                </button>
              </div>
          </div>
        </div>

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-5 shadow-soft">
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

  <!-- @if(isset($usersearch) && $usersearch !== '')
  <div class="mt-4 bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-4 shadow-soft">
    <h3 class="font-extrabold text-ink-900">Résultats</h3>

    <div class="mt-3 space-y-2">
      @forelse($users as $u)
        <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2">
          <div class="w-10 h-10 rounded-2xl overflow-hidden border border-slate-200 bg-slate-100">
            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $u->image_url) }}" alt="">
          </div>
          <div class="leading-tight">
            <p class="text-sm font-bold text-ink-900">{{ $u->name }}</p>
            <p class="text-xs text-slate-500">{{ $u->email }}</p>
          </div>
        </div>
      @empty
        <p class="text-sm text-slate-500 mt-2">Aucun utilisateur trouvé.</p>
      @endforelse
    </div>
  </div>
@endif -->

</body>
</html>
