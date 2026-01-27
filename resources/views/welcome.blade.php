{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobConnect - Plateforme de Recrutement</title>

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

    <style> html { scroll-behavior: smooth; }
    * {scrollbar-width: none;} </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <!-- NAVIGATION -->
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
                            <span class="text-xl font-bold text-slate-900 tracking-tight">JobConnect</span>
                        </a>
                    </div>

                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="#" class="border-brand-600 text-slate-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Offres d'emploi</a>
                        <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Entreprises</a>
                        <a href="#" class="border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Salaires</a>
                    </div>
                </div>

                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-brand-600 font-medium text-sm px-3 py-2">Connexion</a>

                    <a href="{{ route('register') }}" class="bg-brand-600 hover:bg-brand-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition shadow-lg shadow-brand-500/30 flex items-center gap-2">
                        <span>Créer un compte</span>
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

    <!-- HERO SECTION -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 bg-white pb-8 sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32 pt-20 px-4 sm:px-6 lg:px-8 text-center">

                <span class="inline-block py-1 px-3 rounded-full bg-brand-50 text-brand-600 text-sm font-semibold mb-6">
                    🚀 Plus de 500 nouvelles offres cette semaine
                </span>

                <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl md:text-6xl">
                    Trouvez le job qui <br class="hidden sm:inline" />
                    <span class="text-brand-600 relative">
                        compte vraiment
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-brand-200 -z-10" viewBox="0 0 100 10" preserveAspectRatio="none">
                           <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                        </svg>
                    </span>
                </h1>

                <p class="mt-4 max-w-md mx-auto text-base text-slate-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Connectez-vous directement avec les meilleures entreprises. Une plateforme simple, transparente et efficace pour votre carrière.
                </p>

                <!-- Search Box (UI فقط دابا) -->
                <div class="mt-10 max-w-4xl mx-auto">
                    <div class="bg-white p-2 rounded-xl shadow-xl shadow-slate-200 border border-slate-100 sm:flex items-center gap-2">
                        <div class="relative flex-grow group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-4 border-none rounded-lg focus:ring-0 text-slate-900 placeholder-slate-400 sm:text-sm" placeholder="Poste, mots-clés, entreprise...">
                        </div>

                        <div class="hidden sm:block w-px h-10 bg-slate-200"></div>

                        <div class="relative flex-grow group border-t sm:border-t-0 border-slate-100 sm:border-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <input type="text" class="block w-full pl-10 pr-3 py-4 border-none rounded-lg focus:ring-0 text-slate-900 placeholder-slate-400 sm:text-sm" placeholder="Ville ou Code postal">
                        </div>

                        <button class="w-full sm:w-auto mt-2 sm:mt-0 bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 px-8 rounded-lg transition transform active:scale-95 shadow-lg shadow-brand-500/30">
                            Rechercher
                        </button>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap justify-center gap-2 text-sm text-slate-500">
                    <span>Populaire :</span>
                    <a href="#" class="hover:text-brand-600 underline decoration-slate-300 underline-offset-2">Développeur PHP</a>
                    <a href="#" class="hover:text-brand-600 underline decoration-slate-300 underline-offset-2">Commercial</a>
                    <a href="#" class="hover:text-brand-600 underline decoration-slate-300 underline-offset-2">Télétravail</a>
                    <a href="#" class="hover:text-brand-600 underline decoration-slate-300 underline-offset-2">RH</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
