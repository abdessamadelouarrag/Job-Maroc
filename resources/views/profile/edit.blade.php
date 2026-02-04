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

    <!-- ADD EXPERIENCE FORM -->
    <div class="border-t border-slate-200 p-5 bg-slate-50">
      @if ($errors->any())
  <div class="p-3 mb-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

      <form class="space-y-4" method="POST" action="{{ route('experience.store') }}">
        @csrf
        <div>
          <label class="block text-sm font-semibold text-slate-800 mb-1">Experience name / title</label>
          <input
            type="text"
            name="name_of_experience"
            placeholder="Ex: Full Stack Web Developer"
            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200"
          />
        </div>

        <div>
          <label class="block text-sm font-semibold text-slate-800 mb-1">City of Experince</label>
          <input
            type="text"
            name="city"
            placeholder="Ex: Casablanca"
            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200"
          />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-semibold text-slate-800 mb-1">Start date</label>
            <input
              type="date"
              name="date_start"
              class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-200"
            />
          </div>

          <div>
            <label class="block text-sm font-semibold text-slate-800 mb-1">End date</label>
            <input
              type="date"
              name="date_end"
              class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-200"
            />
            <p class="text-xs text-slate-500 mt-1">If it’s current, leave end date empty.</p>
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 pt-1">
          <button type="button" class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-100">
            Cancel
          </button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700">
            Save
          </button>
        </div>
      </form>
    </div>

    <!-- LIST (Example items) -->
    <div class="border-t border-slate-200">
  @forelse ($experiences as $experience)
    <div class="p-5 flex gap-4">
      <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-500">
        {{ strtoupper(substr($experience->name_of_experience, 0, 1)) }}
      </div>

      <div class="flex-1">
        <div class="flex items-start justify-between gap-3">
          <div>
            <p class="font-bold text-slate-900 leading-tight">
              {{ $experience->name_of_experience }}
            </p>

            <p class="text-sm text-slate-700">
              {{ $experience->city }}
            </p>

            <p class="text-xs text-slate-500 mt-1">
              Start: {{ \Carbon\Carbon::parse($experience->date_start)->format('M Y') }}
              —
              End:
              {{ $experience->date_end
                  ? \Carbon\Carbon::parse($experience->date_end)->format('M Y')
                  : 'Present'
              }}
            </p>
          </div>
        </div>
      </div>
    </div>
  @empty
    <div class="p-5 text-sm text-slate-500">
      No experiences added yet.
    </div>
  @endforelse
</div>

  </div>


  <!-- EDUCATION -->
  <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="p-5 flex items-center justify-between">
      <h3 class="text-lg font-bold text-slate-900">Education</h3>
      <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">+ Add</button>
    </div>

    <!-- ADD EDUCATION FORM -->
    <div class="border-t border-slate-200 p-5 bg-slate-50">
      <form class="space-y-4" method="POST" action="{{route('education.store')}}">
        @csrf
        <div>
          <label class="block text-sm font-semibold text-slate-800 mb-1">Formation / School / Diploma</label>
          <input
            type="text"
            name="name_of_formation"
            placeholder="Ex: YouCode — UM6P | Web Development Program"
            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200"
          />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-semibold text-slate-800 mb-1">Start date</label>
            <input
              type="date"
              name="date_start"
              class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-200"
            />
          </div>

          <div>
            <label class="block text-sm font-semibold text-slate-800 mb-1">End date</label>
            <input
              type="date"
              name="date_end"
              class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-200"
            />
            <p class="text-xs text-slate-500 mt-1">Leave empty if ongoing.</p>
          </div>
        </div>

        <div class="flex items-center justify-end gap-2 pt-1">
          <button type="button" class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-100">
            Cancel
          </button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700">
            Save
          </button>
        </div>
      </form>
    </div>

    <!-- LIST (Example item) -->
    <div class="border-t border-slate-200">
      @forelse($educations as $education)
      <div class="p-5 flex gap-4">
        <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-600">
          {{ strtoupper(substr($experience->name_of_formation, 0, 1)) }}
        </div>

        <div class="flex-1">
          <p class="font-bold text-slate-900 leading-tight">{{$experience->name_of_formation}}</p>
          <p class="text-xs text-slate-500 mt-1">Start: Start: {{ \Carbon\Carbon::parse($education->date_start)->format('M Y') }} · End: {{ \Carbon\Carbon::parse($education->date_end)->format('M Y') }}</p>
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

    <!-- ADD SKILL FORM -->
    <div class="border-t border-slate-200 p-5 bg-slate-50">
      <form class="flex flex-col md:flex-row gap-3 items-end">
        <div class="flex-1 w-full">
          <label class="block text-sm font-semibold text-slate-800 mb-1">Skill name</label>
          <input
            type="text"
            name="name_skills"
            placeholder="Ex: Laravel"
            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-200"
          />
        </div>

        <button type="submit" class="w-full md:w-auto px-4 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700">
          Add skill
        </button>
      </form>
    </div>

    <!-- LIST (Example skills) -->
    <div class="border-t border-slate-200 p-5">
      <div class="flex flex-wrap gap-2">
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          Laravel
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          PHP
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          PostgreSQL
        </span>
        <span class="px-3 py-2 rounded-full border border-slate-200 bg-slate-50 text-sm font-semibold text-slate-800">
          Tailwind CSS
        </span>
      </div>
    </div>
  </div>

</section>

</main>

</body>
</html>
