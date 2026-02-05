<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Créer une offre | JobMaroc</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          boxShadow: { soft: '0 10px 30px rgba(2,6,23,.08)' }
        }
      }
    }
  </script>
</head>

<body class="font-sans bg-slate-50 text-slate-800">
  <!-- Top bar -->
  <header class="sticky top-0 z-40 bg-white/60 backdrop-blur-xl border-b border-white/60">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
      <div>
        <p class="text-sm font-extrabold text-slate-900 leading-tight">Créer une offre</p>
        <p class="text-xs text-slate-500">JobMaroc • Recruteur</p>
      </div>

      <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-100 px-3 py-1 rounded-full">
        Recruiter Mode
      </span>
    </div>
  </header>

  <main class="py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
      <div class="relative">
        <!-- Soft blobs -->
        <div class="absolute -top-10 -left-10 w-44 h-44 bg-indigo-200/40 blur-3xl rounded-full"></div>
        <div class="absolute top-16 -right-12 w-52 h-52 bg-cyan-200/40 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-12 left-24 w-56 h-56 bg-fuchsia-200/30 blur-3xl rounded-full"></div>

        <!-- Card -->
        <section class="relative bg-white/70 backdrop-blur-xl border border-white/60 rounded-3xl p-6 shadow-soft">
          <div class="flex items-start justify-between gap-4">
            <div>
              <h1 class="text-base font-extrabold text-slate-900">Publier une offre d’emploi</h1>
              <p class="text-xs text-slate-500 mt-1">Titre, lieu, image (preview), description.</p>
            </div>

            <div class="shrink-0 text-xs font-semibold text-slate-700 bg-white border border-slate-200 px-3 py-1 rounded-full">
              Public
            </div>
          </div>

          <!-- FORM -->
          <form class="mt-6 space-y-5" action="#" method="post" enctype="multipart/form-data">
            <!-- Title + Place -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="text-xs font-semibold text-slate-600">
                  Titre de l’offre <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  name="title"
                  required
                  placeholder="Ex: Développeur Full Stack (Laravel)"
                  class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800
                         placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-slate-300"
                >
                <p class="mt-2 text-xs text-slate-400">Astuce : Poste + tech/role = meilleur.</p>
              </div>

              <div>
                <label class="text-xs font-semibold text-slate-600">
                  Lieu <span class="text-red-500">*</span>
                </label>
                <input
                  type="text"
                  name="place"
                  required
                  placeholder="Ex: Fès / Casablanca / Remote"
                  class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800
                         placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-slate-300"
                >
                <p class="mt-2 text-xs text-slate-400">Ex : “Casablanca (Hybrid)”</p>
              </div>
            </div>

            <!-- Image upload + preview -->
            <div>
              <label class="text-xs font-semibold text-slate-600">
                Image de l’offre <span class="text-slate-400">(optionnel)</span>
              </label>

              <label class="mt-2 block cursor-pointer">
                <div class="rounded-3xl border border-dashed border-slate-300 bg-white/80 p-5 transition hover:border-slate-400 hover:shadow-sm">
                  <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                    <!-- Icon -->
                    <div class="h-12 w-12 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4-4a3 3 0 014 0l1 1a3 3 0 004 0l3-3m-7-3h.01M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>

                    <!-- Text -->
                    <div class="flex-1">
                      <p class="text-sm font-semibold text-slate-900">Uploader une image</p>
                      <p class="text-xs text-slate-500 mt-1">PNG/JPG — idéal 1200×630. Clique pour choisir.</p>

                      <div class="mt-3 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-50 border border-slate-200 text-xs text-slate-600">
                        <span class="font-semibold">Fichier:</span>
                        <span id="fileName" class="text-slate-500">Aucun</span>
                      </div>

                      <p id="fileHint" class="mt-2 text-xs text-slate-400 hidden">Clique pour changer l’image.</p>
                    </div>

                    <!-- Preview box -->
                    <div class="shrink-0">
                      <div
                        class="h-24 w-full sm:w-36 rounded-2xl border border-slate-200 bg-slate-50 flex items-center justify-center overflow-hidden"
                      >
                        <div id="emptyPreview" class="text-xs text-slate-400">Preview</div>
                        <img id="imgPreview" src="" alt="Preview" class="hidden w-full h-full object-cover">
                      </div>
                    </div>
                  </div>
                </div>

                <input id="fileInput" type="file" name="image_offer" accept="image/*" class="hidden">
              </label>

              <p id="fileError" class="mt-2 text-xs text-red-600 hidden">Format non supporté. Choisis une image (PNG/JPG/WebP).</p>
            </div>

            <!-- Type d’offre (pills) -->
<div>
  <label class="text-xs font-semibold text-slate-600 mb-2 block">
    Type d’offre <span class="text-red-500">*</span>
  </label>

  <div class="flex flex-wrap gap-2">
    <label class="cursor-pointer">
      <input type="radio" name="type_offre" value="cdi" class="hidden peer" required>
      <span class="px-4 py-2 rounded-full border border-slate-200 text-sm
                   peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                   transition">CDI</span>
    </label>

    <label class="cursor-pointer">
      <input type="radio" name="type_offre" value="cdd" class="hidden peer">
      <span class="px-4 py-2 rounded-full border border-slate-200 text-sm
                   peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                   transition">CDD</span>
    </label>

    <label class="cursor-pointer">
      <input type="radio" name="type_offre" value="stage" class="hidden peer">
      <span class="px-4 py-2 rounded-full border border-slate-200 text-sm
                   peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                   transition">Stage</span>
    </label>

    <label class="cursor-pointer">
      <input type="radio" name="type_offre" value="freelance" class="hidden peer">
      <span class="px-4 py-2 rounded-full border border-slate-200 text-sm
                   peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                   transition">Freelance</span>
    </label>

    <label class="cursor-pointer">
      <input type="radio" name="type_offre" value="alternance" class="hidden peer">
      <span class="px-4 py-2 rounded-full border border-slate-200 text-sm
                   peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                   transition">Alternance</span>
    </label>
  </div>
</div>


            <!-- Description -->
            <div>
              <label class="text-xs font-semibold text-slate-600">
                Description <span class="text-red-500">*</span>
              </label>
              <textarea
                name="description"
                required
                rows="8"
                placeholder="Missions, profil recherché, avantages…"
                class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800
                       placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-slate-300"
              ></textarea>

              <div class="mt-3 flex flex-wrap gap-2">
                <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-100 px-3 py-1 rounded-full">Missions</span>
                <span class="text-xs font-semibold text-slate-600 bg-slate-50 border border-slate-200 px-3 py-1 rounded-full">Profil</span>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1 rounded-full">Avantages</span>
              </div>
            </div>

            <!-- Actions -->
            <div class="pt-2 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
              <p class="text-xs text-slate-500">Design only — tu peux brancher Laravel après.</p>

              <div class="flex items-center gap-2">
                <button
                  type="button"
                  class="px-4 py-2 rounded-2xl border border-slate-200 bg-white text-sm text-slate-700 hover:bg-slate-50 transition active:scale-[0.99]"
                >
                  Annuler
                </button>

                <button
                  type="submit"
                  class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-2xl bg-indigo-600 text-white text-sm font-semibold
                         transition hover:-translate-y-[1px] hover:shadow-md active:translate-y-0"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  Publier l’offre
                </button>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </main>

  <script>
    const fileInput    = document.getElementById('fileInput');
    const fileName     = document.getElementById('fileName');
    const imgPreview   = document.getElementById('imgPreview');
    const emptyPreview = document.getElementById('emptyPreview');
    const fileError    = document.getElementById('fileError');
    const fileHint     = document.getElementById('fileHint');

    const allowed = ['image/png', 'image/jpeg', 'image/webp', 'image/gif'];

    fileInput.addEventListener('change', () => {
      fileError.classList.add('hidden');

      const file = fileInput.files?.[0];
      if (!file) {
        fileName.textContent = 'Aucun';
        imgPreview.classList.add('hidden');
        emptyPreview.classList.remove('hidden');
        fileHint.classList.add('hidden');
        imgPreview.src = '';
        return;
      }

      fileName.textContent = file.name;

      if (!allowed.includes(file.type)) {
        fileError.classList.remove('hidden');
        fileInput.value = '';
        fileName.textContent = 'Aucun';
        imgPreview.classList.add('hidden');
        emptyPreview.classList.remove('hidden');
        fileHint.classList.add('hidden');
        imgPreview.src = '';
        return;
      }

      // Preview image
      const url = URL.createObjectURL(file);
      imgPreview.src = url;
      imgPreview.classList.remove('hidden');
      emptyPreview.classList.add('hidden');
      fileHint.classList.remove('hidden');

      // cleanup old blob URL when image loads
      imgPreview.onload = () => URL.revokeObjectURL(url);
    });
  </script>
</body>
</html>
