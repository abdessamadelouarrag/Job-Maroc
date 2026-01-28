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
              50: '#eef2ff',
              100: '#e0e7ff',
              500: '#6366f1',
              600: '#4f46e5',
              700: '#4338ca',
              900: '#312e81',
            }
          }
        }
      }
    }
  </script>
</head>

<body class="bg-slate-100 text-slate-800 font-sans antialiased">

  {{-- Top Bar --}}
  <header class="sticky top-0 z-50 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2">
        <div class="bg-brand-600 text-white p-1.5 rounded-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        <span class="text-xl font-bold text-slate-900 tracking-tight">JobMaroc</span>
      </a>

      <div class="flex items-center gap-3">
        <span class="hidden sm:inline text-sm text-slate-500">
          Connecté en tant que <span class="font-semibold text-slate-700">{{ auth()->user()->name }}</span>
        </span>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="text-sm font-semibold text-slate-600 hover:text-brand-600 px-3 py-2">
            Logout
          </button>
        </form>
      </div>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

      {{-- LEFT: Profile --}}
      <aside class="lg:col-span-3">
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
          {{-- Banner --}}
          <div class="h-20 overflow-hidden">
              <img src="{{ asset('storage/' . auth()->user()->banner_url)}}" alt="">
          </div>

          <div class="px-5 pb-5">
            {{-- Avatar --}}
            <div class="-mt-8 flex items-end justify-between">
              <div class="w-16 h-16 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-center overflow-hidden">
                {{-- Avatar placeholder --}}
                <!-- <span class="text-brand-700 font-bold text-xl">
                  {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </span> -->
                <img src="{{ asset('storage/' . auth()->user()->image_url)}}" class="w-full h-full object-cover">
              </div>

              <a href="{{ route('profile.edit') }}"
                 class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700">
                Edit profile
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
              </a>
            </div>

            <div class="mt-4">
              <h2 class="text-lg font-bold text-slate-900">{{ auth()->user()->name }}</h2>
              <p class="text-sm text-slate-500">{{ auth()->user()->email }}</p>
            </div>

            <div class="mt-4 grid grid-cols-3 gap-2">
              <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="text-xs text-slate-500">Posts</p>
                <p class="font-bold text-slate-900">12</p>
              </div>
              <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="text-xs text-slate-500">Friends</p>
                <p class="font-bold text-slate-900">34</p>
              </div>
              <div class="rounded-xl border border-slate-200 bg-slate-50 p-3 text-center">
                <p class="text-xs text-slate-500">Views</p>
                <p class="font-bold text-slate-900">128</p>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <h3 class="font-bold text-slate-900">Quick actions</h3>
          <div class="mt-3 space-y-2 text-sm">
            <a class="block text-slate-600 hover:text-brand-600" href="#">Saved jobs</a>
            <a class="block text-slate-600 hover:text-brand-600" href="#">My applications</a>
            <a class="block text-slate-600 hover:text-brand-600" href="#">Settings</a>
          </div>
        </div>
      </aside>

      {{-- MIDDLE: Posts --}}
      <section class="lg:col-span-6 space-y-6">
        {{-- Create post (static UI) --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-100 flex items-center justify-center font-bold text-brand-700 overflow-hidden">
              <img class="w-full h-full object-cover" src="{{ asset('storage/' . auth()->user()->image_url)}}">
            </div>
            <input
              type="text"
              disabled
              class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-500"
              placeholder="Partager quelque chose… (static)"
            />
          </div>
          <div class="mt-4 flex gap-2">
            <button disabled class="px-3 py-2 rounded-xl border border-slate-200 text-sm text-slate-500 bg-white">Photo</button>
            <button disabled class="px-3 py-2 rounded-xl border border-slate-200 text-sm text-slate-500 bg-white">Article</button>
            <button disabled class="px-3 py-2 rounded-xl border border-slate-200 text-sm text-slate-500 bg-white">Job</button>
          </div>
        </div>

        {{-- Post 1 --}}
        <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-start justify-between">
            <div class="flex gap-3">
              <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700">A</div>
              <div>
                <p class="font-semibold text-slate-900">Admin JobMaroc</p>
                <p class="text-xs text-slate-500">Il y a 2h • Public</p>
              </div>
            </div>
            <button class="text-slate-400 hover:text-slate-600">•••</button>
          </div>

          <p class="mt-4 text-slate-700 text-sm leading-relaxed">
            Nouvelle fonctionnalité : recherche par spécialité + profils améliorés. 🚀 (Post static)
          </p>

          <div class="mt-4 h-44 rounded-xl bg-slate-100 border border-slate-200"></div>

          <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>124 likes</span>
            <span>18 commentaires</span>
          </div>

          <div class="mt-4 pt-4 border-t border-slate-200 flex gap-2">
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Like</button>
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Comment</button>
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Share</button>
          </div>
        </article>

        {{-- Post 2 --}}
        <article class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-start justify-between">
            <div class="flex gap-3">
              <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700">Y</div>
              <div>
                <p class="font-semibold text-slate-900">YouCode Community</p>
                <p class="text-xs text-slate-500">Hier • Public</p>
              </div>
            </div>
            <button class="text-slate-400 hover:text-slate-600">•••</button>
          </div>

          <p class="mt-4 text-slate-700 text-sm leading-relaxed">
            Astuce Laravel: organise tes views, utilise layouts, et garde ton code clean. ✅ (Post static)
          </p>

          <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
            <span>78 likes</span>
            <span>6 commentaires</span>
          </div>

          <div class="mt-4 pt-4 border-t border-slate-200 flex gap-2">
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Like</button>
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Comment</button>
            <button class="flex-1 px-3 py-2 rounded-xl hover:bg-slate-50 text-sm font-semibold text-slate-600">Share</button>
          </div>
        </article>
      </section>

      {{-- RIGHT: Friends (static) --}}
      <aside class="lg:col-span-3 space-y-6">
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <h3 class="font-bold text-slate-900">My friends</h3>
          <p class="text-sm text-slate-500 mt-1">Suggestions (static)</p>

          <div class="mt-4 space-y-3">
            @php
              $friends = [
                ['name' => 'Sara El Amrani', 'role' => 'UI/UX Designer'],
                ['name' => 'Youssef Benali', 'role' => 'Laravel Developer'],
                ['name' => 'Imane Zahraoui', 'role' => 'Recruiter'],
                ['name' => 'Hamza Ait', 'role' => 'Data Analyst'],
              ];
            @endphp

            @foreach($friends as $f)
              <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700">
                    {{ strtoupper(substr($f['name'], 0, 1)) }}
                  </div>
                  <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $f['name'] }}</p>
                    <p class="text-xs text-slate-500">{{ $f['role'] }}</p>
                  </div>
                </div>
                <button class="px-3 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50">
                  Add
                </button>
              </div>
            @endforeach
          </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <h3 class="font-bold text-slate-900">Tips</h3>
          <ul class="mt-3 text-sm text-slate-600 space-y-2">
            <li>• Complète ton profil</li>
            <li>• Ajoute ta spécialité</li>
            <li>• Explore les offres</li>
          </ul>
        </div>
      </aside>

    </div>
  </main>

</body>
</html>
