{{-- resources/views/users/show.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil — {{ $user->name ?? 'User' }}</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  {{-- Material Symbols (Icons) --}}
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          boxShadow: { soft: '0 14px 40px rgba(2, 6, 23, 0.10)' },
          keyframes: {
            fadeUp: { '0%': {opacity:'0', transform:'translateY(14px)'}, '100%': {opacity:'1', transform:'translateY(0)'} },
            fadeDown:{ '0%': {opacity:'0', transform:'translateY(-10px)'}, '100%': {opacity:'1', transform:'translateY(0)'} },
            pop:    { '0%': {opacity:'0', transform:'scale(.98)'}, '100%': {opacity:'1', transform:'scale(1)'} },
            floaty: { '0%,100%': {transform:'translateY(0px)'}, '50%': {transform:'translateY(-10px)'} },
          },
          animation: {
            fadeUp: 'fadeUp .65s ease-out both',
            fadeDown: 'fadeDown .5s ease-out both',
            pop: 'pop .35s ease-out both',
            floaty: 'floaty 8s ease-in-out infinite',
          }
        }
      }
    }
  </script>

  <style>
    body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
    ::-webkit-scrollbar { width: 10px; }
    ::-webkit-scrollbar-thumb { background: rgba(15,23,42,.18); border-radius: 999px; }
    ::-webkit-scrollbar-thumb:hover { background: rgba(15,23,42,.28); }
    @media (prefers-reduced-motion: reduce) { * { animation: none !important; transition: none !important; } }

    /* Material symbols helper */
    .ms {
      font-family: 'Material Symbols Outlined';
      font-weight: 400;
      font-style: normal;
      font-size: 22px;
      line-height: 1;
      display: inline-flex;
      vertical-align: middle;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

@php
  use Illuminate\Support\Facades\Storage;

  $img = function ($path) {
      if (!$path) return null;
      if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) return $path;

      $path = preg_replace('#^public/#', '', $path);

      if (Storage::disk('public')->exists($path)) {
          return Storage::url($path);
      }

      return file_exists(public_path($path)) ? asset($path) : null;
  };

  $avatar = $img($user->image_url ?? null);
  $banner = $img($user->banner_url ?? null);

  $headline = $user->headline ?? 'Développeur Web';
  $location = $user->location ?? 'Maroc';
  $bio = $user->bio ?? "Aucune description pour le moment";
@endphp

{{-- Decorative blobs --}}
<div class="pointer-events-none fixed inset-0 overflow-hidden">
  <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-cyan-200/35 blur-3xl animate-floaty"></div>
  <div class="absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-indigo-200/25 blur-3xl animate-floaty" style="animation-delay: 1.5s;"></div>
</div>

{{-- TOP BAR --}}
<header class="sticky top-0 z-50 animate-fadeDown">
  <div class="backdrop-blur-xl bg-white/75 border-b border-white/60 shadow-[0_1px_0_rgba(15,23,42,.06)]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-cyan-500 to-indigo-600 shadow-soft flex items-center justify-center">
          <span class="text-white font-extrabold">JM</span>
        </div>
        <div class="leading-tight">
          <p class="text-lg font-extrabold tracking-tight text-slate-900">JobMaroc</p>
          <p class="text-[11px] text-slate-500 -mt-1">Profil</p>
        </div>
      </a>

      <div class="flex items-center gap-2">
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                  border border-slate-200 bg-white hover:bg-slate-50 transition active:scale-[0.99]">
          <span class="ms">arrow_back</span>
          Retour
        </a>

        @if(Route::has('dashboard'))
          <a href="{{ route('dashboard') }}"
             class="hidden sm:inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                    bg-slate-900 text-white hover:bg-slate-800 transition active:scale-[0.99]">
            <span class="ms">space_dashboard</span>
            Dashboard
          </a>
        @endif
      </div>
    </div>
  </div>
</header>

<main class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

  {{-- HERO CARD --}}
  <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl overflow-hidden shadow-soft animate-fadeUp">

    {{-- BANNER --}}
    <div class="relative h-44 sm:h-56 bg-slate-200">
      @if($banner)
        <img src="{{ $banner }}" class="w-full h-full object-cover" alt="banner">
      @else
        <div class="w-full h-full bg-gradient-to-r from-slate-900 via-slate-700 to-cyan-700"></div>
      @endif

      <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/10 to-transparent"></div>
    </div>

    {{-- CONTENT --}}
    <div class="px-5 sm:px-7 pb-7">

      <div class="relative z-20 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 pt-6">


        <div class="flex items-end gap-4">
          {{-- Avatar --}}
          <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-white border-4 border-white overflow-hidden shadow-lg">
            @if($avatar)
              <img src="{{ $avatar }}" class="w-full h-full object-cover" alt="avatar">
            @else
              <div class="w-full h-full bg-slate-100 flex items-center justify-center font-extrabold text-slate-600 text-xl">
                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
              </div>
            @endif
          </div>

          {{-- Text --}}
          <div class="pb-1">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight bg-white/30 p-1 rounded-xl">
              {{ $user->name }}
            </h1>

            <p class="text-sm sm:text-base text-slate-700 font-semibold">
              {{ $headline }}
            </p>

            <p class="text-sm text-slate-500 mt-1 flex flex-wrap items-center gap-x-2 gap-y-1">
              <span class="inline-flex items-center gap-1">
                <span class="ms" style="font-size:18px;">location_on</span>
                <span class="font-medium">{{ $location }}</span>
              </span>
              <span class="text-slate-300">•</span>
              <span class="inline-flex items-center gap-1">
                <span class="ms" style="font-size:18px;">mail</span>
                <span>{{ $user->email }}</span>
              </span>
            </p>

            <div class="mt-3 flex flex-wrap gap-2">
              <span class="inline-flex items-center gap-2 rounded-full bg-cyan-50 text-cyan-700 border border-cyan-100 px-3 py-1 text-xs font-semibold">
                <span class="ms" style="font-size:18px;">verified</span>
                Disponible
              </span>
              <span class="inline-flex items-center gap-2 rounded-full bg-slate-50 text-slate-700 border border-slate-200 px-3 py-1 text-xs font-semibold">
                <span class="ms" style="font-size:18px;">badge</span>
                {{ $user->role ?? 'Membre' }}
              </span>
            </div>
          </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-2 sm:pb-1">
          <button class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                         bg-slate-900 text-white hover:bg-slate-800 transition active:scale-[0.99]">
            <span class="ms">login</span>
            Se connecter
          </button>
          <button class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                         border border-slate-200 bg-white hover:bg-slate-50 transition active:scale-[0.99]">
            <span class="ms">chat</span>
            Message
          </button>
        </div>
      </div>

      {{-- ABOUT --}}
      <div class="mt-6">
        <h2 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <span class="ms">info</span>
          À propos
        </h2>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">
          {{ $bio }}
        </p>
      </div>

    </div>
  </section>

  {{-- GRID --}}
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    {{-- LEFT --}}
    <div class="lg:col-span-8 space-y-6">

      {{-- Experiences --}}
      <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl p-5 sm:p-6 shadow-soft animate-fadeUp" style="animation-delay:.08s;">
        <div class="flex items-center justify-between">
          <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
            <span class="ms">work</span>
            Expériences
          </h3>
        </div>

        <div class="mt-4 space-y-4">
          @forelse ($experiences as $experience)
          <div class="flex gap-3">
            <div class="h-11 w-11 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center">
              <span class="ms text-slate-700">apartment</span>
            </div>
            <div class="flex-1">
              <p class="font-bold text-slate-900">Stage Développeur Web</p>
              <p class="text-sm text-slate-600 font-semibold">Agence • Stage</p>
              <p class="text-sm text-slate-500">2025 — 2026 • {{ $location }}</p>
              <p class="mt-2 text-sm text-slate-600 leading-relaxed">
                Intégration UI, développement de fonctionnalités et optimisation de l’expérience utilisateur.
              </p>
            </div>
          </div>
          @empty
    <div class="p-5 text-sm text-slate-500">
      No experiences added yet.
    </div>
  @endforelse
        </div>
      </section>

      {{-- Formation --}}
      <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl p-5 sm:p-6 shadow-soft animate-fadeUp" style="animation-delay:.12s;">
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <span class="ms">school</span>
          Formation
        </h3>

        <div class="mt-4 space-y-4">
          <div class="flex gap-3">
            <div class="h-11 w-11 rounded-xl bg-cyan-50 border border-cyan-100 flex items-center justify-center">
              <span class="ms text-cyan-700">school</span>
            </div>
            <div class="flex-1">
              <p class="font-bold text-slate-900">YouCode Safi (UM6P)</p>
              <p class="text-sm text-slate-600 font-semibold">Développement Web • Full Stack</p>
              <p class="text-sm text-slate-500">2024 — 2026</p>
            </div>
          </div>

          <div class="flex gap-3">
            <div class="h-11 w-11 rounded-xl bg-cyan-50 border border-cyan-100 flex items-center justify-center">
              <span class="ms text-cyan-700">menu_book</span>
            </div>
            <div class="flex-1">
              <p class="font-bold text-slate-900">Auto-formation</p>
              <p class="text-sm text-slate-600 font-semibold">Laravel, PostgreSQL, UI/UX</p>
              <p class="text-sm text-slate-500">En continu</p>
            </div>
          </div>
        </div>
      </section>

    </div>

    {{-- RIGHT --}}
    <aside class="lg:col-span-4 space-y-6">

      {{-- Contact --}}
      <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.1s;">
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <span class="ms">contact_page</span>
          Coordonnées
        </h3>

        <div class="mt-4 space-y-3 text-sm">
          <div class="flex items-start justify-between gap-3">
            <span class="text-slate-500 inline-flex items-center gap-2">
              <span class="ms" style="font-size:18px;">mail</span> Email
            </span>
            <span class="font-semibold text-slate-900">{{ $user->email }}</span>
          </div>

          <div class="flex items-start justify-between gap-3">
            <span class="text-slate-500 inline-flex items-center gap-2">
              <span class="ms" style="font-size:18px;">call</span> Téléphone
            </span>
            <span class="font-semibold text-slate-900">{{ $user->phone ?? '—' }}</span>
          </div>

          <div class="flex items-start justify-between gap-3">
            <span class="text-slate-500 inline-flex items-center gap-2">
              <span class="ms" style="font-size:18px;">language</span> Site
            </span>
            <span class="font-semibold text-slate-900">{{ $user->website ?? '—' }}</span>
          </div>
        </div>
      </section>

      {{-- Skills --}}
      <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.14s;">
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <span class="ms">auto_awesome</span>
          Compétences
        </h3>

        <div class="mt-4 flex flex-wrap gap-2">
          @php
            $skills = is_array($user->skills ?? null) ? $user->skills : ['Laravel','PHP','PostgreSQL','Tailwind','JavaScript'];

            $colors = [
              'bg-blue-50 text-blue-700 border-blue-200',
              'bg-green-50 text-green-700 border-green-200',
              'bg-purple-50 text-purple-700 border-purple-200',
              'bg-yellow-50 text-yellow-700 border-yellow-200',
              'bg-pink-50 text-pink-700 border-pink-200',
              'bg-indigo-50 text-indigo-700 border-indigo-200',
            ];
          @endphp

          @foreach($skills as $i => $skill)
            @php $c = $colors[$i % count($colors)]; @endphp
            <span class="inline-flex items-center gap-2 rounded-full border px-3 py-1 text-xs font-semibold {{ $c }}
                         transition hover:-translate-y-[1px] hover:shadow-sm">
              <span class="ms" style="font-size:18px;">bolt</span>
              {{ $skill }}
            </span>
          @endforeach
        </div>
      </section>

      {{-- Stats --}}
      <section class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl p-5 shadow-soft animate-fadeUp" style="animation-delay:.18s;">
        <h3 class="text-base font-extrabold text-slate-900 flex items-center gap-2">
          <span class="ms">insights</span>
          Aperçu
        </h3>

        <div class="mt-4 grid grid-cols-3 gap-2">
          <div class="rounded-xl border border-slate-200 bg-white p-3 text-center transition hover:-translate-y-[1px] hover:shadow-sm">
            <p class="text-xs text-slate-500 inline-flex items-center justify-center gap-1">
              <span class="ms" style="font-size:18px;">article</span> Posts
            </p>
            <p class="font-extrabold text-slate-900">12</p>
          </div>
          <div class="rounded-xl border border-slate-200 bg-white p-3 text-center transition hover:-translate-y-[1px] hover:shadow-sm">
            <p class="text-xs text-slate-500 inline-flex items-center justify-center gap-1">
              <span class="ms" style="font-size:18px;">group</span> Amis
            </p>
            <p class="font-extrabold text-slate-900">34</p>
          </div>
          <div class="rounded-xl border border-slate-200 bg-white p-3 text-center transition hover:-translate-y-[1px] hover:shadow-sm">
            <p class="text-xs text-slate-500 inline-flex items-center justify-center gap-1">
              <span class="ms" style="font-size:18px;">visibility</span> Vues
            </p>
            <p class="font-extrabold text-slate-900">128</p>
          </div>
        </div>
      </section>

    </aside>
  </div>

</main>

</body>
</html>
