{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobMaroc - Connexion</title>

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

  <style>
    html { scroll-behavior: smooth; }
  </style>
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased">

  <!-- NAV -->
  <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="shrink-0 flex items-center">
            <a href="{{ url('/') }}" class="flex items-center gap-2">
              <div class="bg-brand-600 text-white p-1.5 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <span class="text-xl font-bold text-slate-900 tracking-tight">JobMaroc</span>
            </a>
          </div>

          <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
            <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Offres d'emploi</a>
            <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Entreprises</a>
            <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Salaires</a>
          </div>
        </div>

        <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
          <a href="{{ route('register') }}" class="text-slate-600 hover:text-brand-600 font-medium text-sm px-3 py-2">Créer un compte</a>
          <a href="#" class="bg-brand-600 hover:bg-brand-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition shadow-lg shadow-brand-500/30 flex items-center gap-2">
            <span>Recruteurs</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>

        <div class="-mr-2 flex items-center sm:hidden">
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none">
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- PAGE -->
  <main class="relative">
    <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-brand-100 blur-3xl opacity-60"></div>
    <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-slate-200 blur-3xl opacity-70"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
      <div class="grid lg:grid-cols-2 gap-10 items-center">

        <!-- Left -->
        <div class="text-center lg:text-left">
          <span class="inline-block py-1 px-3 rounded-full bg-brand-50 text-brand-600 text-sm font-semibold mb-6">
            🔒 Connexion sécurisée
          </span>

          <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl">
            Re-bienvenue sur
            <span class="text-brand-600 relative">
              JobConnect
              <svg class="absolute w-full h-3 -bottom-1 left-0 text-brand-200 -z-10" viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
              </svg>
            </span>
          </h1>

          <p class="mt-4 max-w-xl mx-auto lg:mx-0 text-base text-slate-500 sm:text-lg">
            Accédez à votre profil, postulez plus vite, et suivez vos candidatures en un seul endroit.
          </p>

          <div class="mt-8 flex flex-wrap justify-center lg:justify-start gap-2 text-sm text-slate-500">
            <span>Astuce :</span>
            <span class="px-2.5 py-1 rounded-md bg-white border border-slate-200">Email valide</span>
            <span class="px-2.5 py-1 rounded-md bg-white border border-slate-200">Mot de passe fort</span>
            <span class="px-2.5 py-1 rounded-md bg-white border border-slate-200">Reste connecté</span>
          </div>
        </div>

        <!-- Right: Form -->
        <div class="max-w-md w-full mx-auto">
          <div class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden">
            <div class="p-6 sm:p-8">
              <div class="flex items-start justify-between gap-4">
                <div>
                  <h2 class="text-2xl font-bold text-slate-900">Connexion</h2>
                  <p class="text-slate-500 mt-1 text-sm">Entrez vos informations pour continuer</p>
                </div>
                <div class="bg-brand-50 text-brand-600 p-2 rounded-xl border border-brand-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .667 2 1 2 2s-2 1.333-2 2m0-8h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
              </div>

              {{-- ✅ Breeze Login form --}}
              <form class="mt-6 space-y-4" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Email</label>
                  <div class="mt-1 relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 01-8 0m8 0a4 4 0 00-8 0m14-5v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2z" />
                      </svg>
                    </div>
                    <input
                      type="email"
                      name="email"
                      value="{{ old('email') }}"
                      required
                      placeholder="ex: youcode@email.com"
                      class="w-full pl-10 pr-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                    />
                  </div>
                  @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Password -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Mot de passe</label>
                  <div class="mt-1 relative group">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m6-6V9a6 6 0 10-12 0v2H5a2 2 0 00-2 2v5a2 2 0 002 2h14a2 2 0 002-2v-5a2 2 0 00-2-2h-1z" />
                      </svg>
                    </div>
                    <input
                      type="password"
                      name="password"
                      required
                      placeholder="••••••••"
                      class="w-full pl-10 pr-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                    />
                  </div>
                  @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Row -->
                <div class="flex items-center justify-between">
                  <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-brand-600 focus:ring-brand-100" />
                    Se souvenir de moi
                  </label>

                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-brand-600 hover:text-brand-700">
                      Mot de passe oublié ?
                    </a>
                  @endif
                </div>

                <!-- Submit -->
                <button
                  type="submit"
                  class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl transition transform active:scale-[0.99] shadow-lg shadow-brand-500/30"
                >
                  Se connecter
                </button>

                <p class="text-sm text-slate-500 text-center mt-4">
                  Pas de compte ?
                  <a href="{{ route('register') }}" class="font-semibold text-brand-600 hover:text-brand-700">Créer un compte</a>
                </p>
              </form>
            </div>

            <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t border-slate-200">
              <p class="text-xs text-slate-500">
                En vous connectant, vous acceptez nos
                <a href="#" class="text-brand-600 font-semibold hover:underline">Conditions</a> et notre
                <a href="#" class="text-brand-600 font-semibold hover:underline">Politique de confidentialité</a>.
              </p>
            </div>
          </div>

          <p class="text-center text-xs text-slate-400 mt-6">
            © 2026 JobConnect — Tous droits réservés.
          </p>
        </div>

      </div>
    </div>
  </main>

</body>
</html>
