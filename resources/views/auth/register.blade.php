{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JobMaroc - Inscription</title>

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
          <a href="{{ route('login') }}" class="text-slate-600 hover:text-brand-600 font-medium text-sm px-3 py-2">Connexion</a>
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
            ✨ Crée ton compte
          </span>

          <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl">
            Démarre ta
            <span class="text-brand-600 relative">
              carrière
              <svg class="absolute w-full h-3 -bottom-1 left-0 text-brand-200 -z-10" viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
              </svg>
            </span>
            aujourd’hui
          </h1>

          <p class="mt-4 max-w-xl mx-auto lg:mx-0 text-base text-slate-500 sm:text-lg">
            Inscris-toi en quelques secondes et commence à explorer des opportunités adaptées à ton profil.
          </p>

          <div class="mt-8 grid sm:grid-cols-3 gap-3 max-w-xl mx-auto lg:mx-0">
            <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-sm">
              <p class="text-sm font-semibold text-slate-900">Profil</p>
              <p class="text-xs text-slate-500 mt-1">Bio, photo, spécialité</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-sm">
              <p class="text-sm font-semibold text-slate-900">Recherche</p>
              <p class="text-xs text-slate-500 mt-1">Nom, spécialité</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-xl p-4 shadow-sm">
              <p class="text-sm font-semibold text-slate-900">Évolutif</p>
              <p class="text-xs text-slate-500 mt-1">Amis + notifications</p>
            </div>
          </div>
        </div>

        <!-- Right -->
        <div class="max-w-md w-full mx-auto">
          <div class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden">
            <div class="p-6 sm:p-8">
              <div class="flex items-start justify-between gap-4">
                <div>
                  <h2 class="text-2xl font-bold text-slate-900">Inscription</h2>
                  <p class="text-slate-500 mt-1 text-sm">Crée ton compte JobConnect</p>
                </div>
                <div class="bg-brand-50 text-brand-600 p-2 rounded-xl border border-brand-100">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                </div>
              </div>

              {{-- Breeze Register form --}}
              <form class="mt-6 space-y-4" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Role (custom field) -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Type de compte</label>
                  <div class="mt-2 grid grid-cols-2 gap-3">
                    <label class="flex items-center gap-2 p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer">
                      <input type="radio" name="role" value="candidate" checked class="text-brand-600 focus:ring-brand-100" />
                      <span class="text-sm font-semibold text-slate-800">Chercheur d’emploi</span>
                    </label>
                    <label class="flex items-center gap-2 p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer">
                      <input type="radio" name="role" value="recruiter" class="text-brand-600 focus:ring-brand-100" />
                      <span class="text-sm font-semibold text-slate-800">Recruteur</span>
                    </label>
                  </div>
                </div>

                <!-- Name -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Nom complet</label>
                  <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    placeholder="ex: Abdessamad Elouarrag"
                    class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                  />
                  @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Email</label>
                  <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="ex: youcode@email.com"
                    class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                  />
                  @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Specialty / Company (custom fields) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                  <div>
                    <label class="block text-sm font-medium text-slate-700">Spécialité</label>
                    <input
                      type="text"
                      name="specialty"
                      value="{{ old('specialty') }}"
                      placeholder="ex: Laravel"
                      class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                    />
                    @error('specialty')
                      <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-slate-700">Entreprise</label>
                    <input
                      type="text"
                      name="company"
                      value="{{ old('company') }}"
                      placeholder="ex: YouCode"
                      class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                    />
                    @error('company')
                      <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                  </div>
                </div>

                <!-- Password -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Mot de passe</label>
                  <input
                    type="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                  />
                  <p class="mt-2 text-xs text-slate-500">Minimum recommandé : 8 caractères + 1 chiffre.</p>
                  @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Confirm -->
                <div>
                  <label class="block text-sm font-medium text-slate-700">Confirmer le mot de passe</label>
                  <input
                    type="password"
                    name="password_confirmation"
                    required
                    placeholder="••••••••"
                    class="mt-1 w-full px-3 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition"
                  />
                </div>

                <!-- Terms (UI فقط) -->
                <label class="flex items-start gap-2 text-sm text-slate-600">
                  <input type="checkbox" required class="mt-1 rounded border-slate-300 text-brand-600 focus:ring-brand-100" />
                  <span>
                    J’accepte les <a href="#" class="text-brand-600 font-semibold hover:underline">Conditions</a>
                    et la <a href="#" class="text-brand-600 font-semibold hover:underline">Politique de confidentialité</a>.
                  </span>
                </label>

                <!-- Submit -->
                <button
                  type="submit"
                  class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl transition transform active:scale-[0.99] shadow-lg shadow-brand-500/30"
                >
                  Créer mon compte
                </button>

                <p class="text-sm text-slate-500 text-center mt-4">
                  Déjà un compte ?
                  <a href="{{ route('login') }}" class="font-semibold text-brand-600 hover:text-brand-700">Se connecter</a>
                </p>
              </form>
            </div>

            <div class="px-6 sm:px-8 py-4 bg-slate-50 border-t border-slate-200">
              <p class="text-xs text-slate-500">
                Besoin d’aide ? Contacte le support via la page
                <a href="#" class="text-brand-600 font-semibold hover:underline">Contact</a>.
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
