<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile | JobMaroc</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter','sans-serif'] },
          colors: {
            brand: {
              50: '#eef2ff',
              100: '#e0e7ff',
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

<body class="bg-slate-100 font-sans text-slate-800">

<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
  <div class="max-w-5xl mx-auto px-4 h-16 flex items-center justify-between">
    <a href="{{ route('dashboard') }}" class="font-bold text-slate-900">← Dashboard</a>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="text-sm font-semibold text-slate-600 hover:text-brand-600">
        Logout
      </button>
    </form>
  </div>
</header>

<main class="max-w-5xl mx-auto px-4 py-8 space-y-6">

  {{-- Header card --}}
  <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
    <div class="h-28 bg-cover bg-center overflow-hidden">
        <img class="h-full w-full object-cover" src="{{ asset('storage/' . auth()->user()->banner_url)}}">
    </div>

    <div class="p-6">
      <div class="-mt-12 flex items-end justify-between gap-4">
        <div class="w-24 h-24 rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-sm">
          <img src="{{ asset('storage/' . auth()->user()->image_url)}}" class="w-full h-full object-cover">
        </div>

        <div class="text-right">
          <p class="text-sm text-slate-500">Compte</p>
          <p class="font-bold text-slate-900">{{ auth()->user()->name }}</p>
          <p class="text-sm text-slate-500">{{ auth()->user()->email }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- 1) Update Profile (Name/Email) --}}
  <section class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-lg font-bold text-slate-900">Profile information</h2>
    <p class="text-sm text-slate-500 mt-1">Update your name and email.</p>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-4">
      @csrf
      @method('PATCH')

      <div>
        <label class="block text-sm font-medium text-slate-700">Full name</label>
        <input
          type="text"
          name="name"
          value="{{ old('name', auth()->user()->name) }}"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
        @error('name')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-700">Email</label>
        <input
          type="email"
          name="email"
          value="{{ old('email', auth()->user()->email) }}"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
        @error('email')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-700">Bio</label>
        <textarea
          name="bio"
          placeholder="Ajouter votre description"
          required
          class="mt-1 w-full min-h-[120px] px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >{{ old('bio', auth()->user()->bio)}}</textarea>
        @error('bio')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center gap-3">
        <button class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-brand-600/20">
          Save
        </button>

        @if (session('status') === 'profile-updated')
          <span class="text-sm text-green-600 font-semibold">Saved</span>
        @endif
      </div>
    </form>
  </section>

  {{-- 2) Update Images (Avatar/Banner) --}}
  <section class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-lg font-bold text-slate-900">Profile images</h2>
    <p class="text-sm text-slate-500 mt-1">Change avatar and banner.</p>

    <form method="POST" action="{{ route('upload.image') }}" enctype="multipart/form-data" class="mt-6 space-y-5">
      @csrf

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="rounded-2xl border border-slate-200 p-4 bg-slate-50">
          <p class="text-sm font-semibold text-slate-900">Current banner</p>
          <div class="mt-3 h-28 rounded-xl bg-cover bg-center border border-slate-200 overflow-hidden">
            <img src="{{ asset('storage/' . auth()->user()->banner_url)}}" class="w-full h-full object-cover">
          </div>

          <label class="block text-sm font-medium text-slate-700 mt-4">New banner</label>
          <input type="file" name="banner" accept="image/*"
            class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-white file:text-slate-700 file:font-semibold border border-slate-200 rounded-xl p-2 bg-white">

          <p class="text-xs text-slate-500 mt-2">PNG/JPG recommended.</p>
          @error('banner')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div class="rounded-2xl border border-slate-200 p-4 bg-slate-50">
          <p class="text-sm font-semibold text-slate-900">Current avatar</p>
          <div class="mt-3 flex items-center gap-3">
            <div class="w-16 h-16 rounded-2xl overflow-hidden border border-slate-200 bg-white">
              <img src="{{ asset('storage/' . auth()->user()->image_url)}}" class="w-full h-full object-cover">
            </div>
            <div class="text-sm text-slate-600">
              <p class="font-semibold">{{ auth()->user()->name }}</p>
              <p class="text-xs text-slate-500">{{ auth()->user()->email }}</p>
            </div>
          </div>

          <label class="block text-sm font-medium text-slate-700 mt-4">New avatar</label>
          <input type="file" name="image" accept="image/*"
            class="mt-2 block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-white file:text-slate-700 file:font-semibold border border-slate-200 rounded-xl p-2 bg-white">

          <p class="text-xs text-slate-500 mt-2">Square image looks best.</p>
          @error('image')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="flex items-center gap-3">
        <button class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-brand-600/20">
          Save images
        </button>
      </div>

      <p class="text-xs text-slate-500">
        Note: for the upload to really work, the controller must save the files and update `image_url` / `banner_url`.
      </p>
    </form>
  </section>

<section class="max-w-5xl mx-auto px-4 py-8 space-y-6 bg-slate-100">

  <!-- EXPERIENCE -->
  <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-5 flex items-center justify-between">
      <h3 class="text-lg font-bold text-slate-900">Experience</h3>
      <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">+ Add</button>
    </div>

    <div class="border-t border-slate-200">
      <!-- item 1 -->
      <div class="p-5 flex gap-4">
        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-500">
          A
        </div>

        <div class="flex-1">
          <div class="flex items-start justify-between gap-3">
            <div>
              <p class="font-bold text-slate-900 leading-tight">Full Stack Web Developer</p>
              <p class="text-sm text-slate-700">Azura Group · Internship</p>
              <p class="text-xs text-slate-500 mt-1">May 2026 — Present · Casablanca, Morocco</p>
            </div>

            <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
              Current
            </span>
          </div>

          <p class="text-sm text-slate-700 mt-3 leading-relaxed">
            Worked on a Laravel platform with authentication, profile management, and search.
            Built clean UI components with Tailwind and improved database structure.
          </p>

          <div class="mt-3 flex flex-wrap gap-2">
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">Laravel</span>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">PostgreSQL</span>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">Tailwind</span>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">REST APIs</span>
          </div>
        </div>
      </div>

      <div class="border-t border-slate-200"></div>

      <!-- item 2 -->
      <div class="p-5 flex gap-4">
        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-500">
          Y
        </div>

        <div class="flex-1">
          <div class="flex items-start justify-between gap-3">
            <div>
              <p class="font-bold text-slate-900 leading-tight">Backend Developer (Student Projects)</p>
              <p class="text-sm text-slate-700">YouCode UM6P · Projects</p>
              <p class="text-xs text-slate-500 mt-1">Oct 2024 — Apr 2026 · Safi, Morocco</p>
            </div>

            <button class="text-slate-400 hover:text-slate-600" title="More">
              <span class="text-xl leading-none">⋯</span>
            </button>
          </div>

          <p class="text-sm text-slate-700 mt-3 leading-relaxed">
            Developed multiple web apps using MVC principles. Focused on backend logic,
            database migrations, and clean code organization.
          </p>
        </div>
      </div>
    </div>

    <div class="px-5 py-4 bg-slate-50 border-t border-slate-200">
      <button class="text-sm font-semibold text-slate-700 hover:text-slate-900">
        Show all experience →
      </button>
    </div>
  </div>


  <!-- EDUCATION -->
  <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-5 flex items-center justify-between">
      <h3 class="text-lg font-bold text-slate-900">Education</h3>
      <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">+ Add</button>
    </div>

    <div class="border-t border-slate-200">
      <!-- item 1 -->
      <div class="p-5 flex gap-4">
        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600">
          🎓
        </div>

        <div class="flex-1">
          <p class="font-bold text-slate-900 leading-tight">YouCode — UM6P</p>
          <p class="text-sm text-slate-700">Web Development Program</p>
          <p class="text-xs text-slate-500 mt-1">2024 — 2026 · Safi, Morocco</p>

          <p class="text-sm text-slate-700 mt-3 leading-relaxed">
            Focused on full-stack development with Laravel, PostgreSQL, and modern UI.
            Built team projects with GitHub workflow and clean architecture.
          </p>

          <div class="mt-3 flex flex-wrap gap-2">
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">OOP</span>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">MVC</span>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-50 border border-slate-200 text-slate-700">Git/GitHub</span>
          </div>
        </div>
      </div>

      <div class="border-t border-slate-200"></div>

      <!-- item 2 -->
      <div class="p-5 flex gap-4">
        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-500">
          C
        </div>

        <div class="flex-1">
          <p class="font-bold text-slate-900 leading-tight">Certification</p>
          <p class="text-sm text-slate-700">Responsive Web Design</p>
          <p class="text-xs text-slate-500 mt-1">2025</p>

          <p class="text-sm text-slate-700 mt-3 leading-relaxed">
            Built responsive layouts and improved UI consistency with modern CSS utilities.
          </p>
        </div>
      </div>
    </div>
  </div>


  <!-- SKILLS -->
  <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-5 flex items-center justify-between">
      <h3 class="text-lg font-bold text-slate-900">Skills</h3>
      <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">+ Add</button>
    </div>

    <div class="border-t border-slate-200 p-5">
      <div class="flex flex-wrap gap-2">
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          Laravel <span class="text-xs font-bold text-slate-500">(Advanced)</span>
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          PHP <span class="text-xs font-bold text-slate-500">(Advanced)</span>
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          PostgreSQL <span class="text-xs font-bold text-slate-500">(Intermediate)</span>
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          Tailwind CSS <span class="text-xs font-bold text-slate-500">(Advanced)</span>
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          REST APIs <span class="text-xs font-bold text-slate-500">(Intermediate)</span>
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          Git/GitHub <span class="text-xs font-bold text-slate-500">(Intermediate)</span>
        </span>
      </div>

      <div class="mt-4">
        <button class="text-sm font-semibold text-slate-700 hover:text-slate-900">
          Show all skills →
        </button>
      </div>
    </div>
  </div>

</section>


</main>

{{-- JS: add/remove dynamic items --}}
<script>
  function removeHandler(root) {
    root.querySelectorAll('.remove-item').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.closest('.edu-item, .exp-item, .skill-item');
        if (item) item.remove();
      });
    });
  }

  function nextIndex(listEl, prefix) {
    const inputs = listEl.querySelectorAll(`input[name^="${prefix}["], textarea[name^="${prefix}["], select[name^="${prefix}["]`);
    let max = -1;
    inputs.forEach(inp => {
      const m = inp.name.match(new RegExp(`^${prefix}\\[(\\d+)\\]`));
      if (m) max = Math.max(max, parseInt(m[1], 10));
    });
    return max + 1;
  }

  const educationList = document.getElementById('education-list');
  const experienceList = document.getElementById('experience-list');
  const skillsList    = document.getElementById('skills-list');

  document.getElementById('add-education').addEventListener('click', () => {
    const i = nextIndex(educationList, 'education');
    const div = document.createElement('div');
    div.className = 'edu-item rounded-2xl border border-slate-200 p-4 bg-slate-50';
    div.innerHTML = `
      <div class="flex items-start justify-between gap-3">
        <p class="text-sm font-semibold text-slate-900">Formation #${i+1}</p>
        <button type="button" class="remove-item text-xs font-bold text-red-600 hover:text-red-700">Supprimer</button>
      </div>
      <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-semibold text-slate-600">École / Organisme</label>
          <input type="text" name="education[${i}][school]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="YouCode / UM6P ...">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Diplôme / Titre</label>
          <input type="text" name="education[${i}][degree]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Développement Web ...">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Début</label>
          <input type="month" name="education[${i}][start]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Fin (optionnel)</label>
          <input type="month" name="education[${i}][end]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300">
        </div>
        <div class="md:col-span-2">
          <label class="block text-xs font-semibold text-slate-600">Description (optionnel)</label>
          <textarea name="education[${i}][description]"
            class="mt-1 w-full min-h-[90px] px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Modules, projets, etc..."></textarea>
        </div>
      </div>
    `;
    educationList.appendChild(div);
    removeHandler(div);
  });

  document.getElementById('add-experience').addEventListener('click', () => {
    const i = nextIndex(experienceList, 'experiences');
    const div = document.createElement('div');
    div.className = 'exp-item rounded-2xl border border-slate-200 p-4 bg-slate-50';
    div.innerHTML = `
      <div class="flex items-start justify-between gap-3">
        <p class="text-sm font-semibold text-slate-900">Expérience #${i+1}</p>
        <button type="button" class="remove-item text-xs font-bold text-red-600 hover:text-red-700">Supprimer</button>
      </div>
      <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-semibold text-slate-600">Entreprise</label>
          <input type="text" name="experiences[${i}][company]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Nom de l'entreprise">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Poste</label>
          <input type="text" name="experiences[${i}][title]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Full Stack Developer ...">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Début</label>
          <input type="month" name="experiences[${i}][start]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Fin (optionnel)</label>
          <input type="month" name="experiences[${i}][end]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300">
        </div>
        <div class="md:col-span-2">
          <label class="block text-xs font-semibold text-slate-600">Missions</label>
          <textarea name="experiences[${i}][description]"
            class="mt-1 w-full min-h-[90px] px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Ce que tu as fait..."></textarea>
        </div>
      </div>
    `;
    experienceList.appendChild(div);
    removeHandler(div);
  });

  document.getElementById('add-skill').addEventListener('click', () => {
    const i = nextIndex(skillsList, 'skills');
    const div = document.createElement('div');
    div.className = 'skill-item rounded-2xl border border-slate-200 p-4 bg-slate-50';
    div.innerHTML = `
      <div class="flex items-start justify-between gap-3">
        <p class="text-sm font-semibold text-slate-900">Compétence #${i+1}</p>
        <button type="button" class="remove-item text-xs font-bold text-red-600 hover:text-red-700">Supprimer</button>
      </div>
      <div class="mt-3 grid grid-cols-1 md:grid-cols-3 gap-3">
        <div class="md:col-span-2">
          <label class="block text-xs font-semibold text-slate-600">Nom</label>
          <input type="text" name="skills[${i}][name]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
            placeholder="Laravel, Tailwind, PostgreSQL...">
        </div>
        <div>
          <label class="block text-xs font-semibold text-slate-600">Niveau</label>
          <select name="skills[${i}][level]"
            class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300">
            <option value="beginner">Beginner</option>
            <option value="intermediate" selected>Intermediate</option>
            <option value="advanced">Advanced</option>
          </select>
        </div>
      </div>
    `;
    skillsList.appendChild(div);
    removeHandler(div);
  });

  // attach remove on initial elements
  removeHandler(document);
</script>

</body>
</html>
