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
        <img class="h-full w-full object-cover" src="{{ auth()->user()->banner_url}}">
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
        <label class="block text-sm font-medium text-slate-700">Specialite</label>
        <input
          type="specialite"
          name="specialite"
          value="{{ old('specialite', auth()->user()->specialite) }}"
          placeholder="Ajouter votre specialite"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
        @error('')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-700">Bio</label>
        <textarea
          type="Bio"
          name="Bio"
          placeholder="Ajouter votre description"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >{{ old('bio', auth()->user()->bio)}}</textarea>
        @error('')
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
      <!-- @method('PATCH') -->

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
              <!-- <img src="{{ auth()->user()->image_url}}"> -->
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

  {{-- 3) Update Password --}}
  <section class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-lg font-bold text-slate-900">Reset password</h2>
    <p class="text-sm text-slate-500 mt-1">Change your current password.</p>

    <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-medium text-slate-700">Current password</label>
        <input
          type="password"
          name="current_password"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
        @error('current_password')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-700">New password</label>
        <input
          type="password"
          name="password"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
        @error('password')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-700">Confirm new password</label>
        <input
          type="password"
          name="password_confirmation"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300"
        >
      </div>

      <div class="flex items-center gap-3">
        <button class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-brand-600/20">
          Update password
        </button>

        @if (session('status') === 'password-updated')
          <span class="text-sm text-green-600 font-semibold">Password updated ✅</span>
        @endif
      </div>
    </form>
  </section>

  {{-- 4) Delete Account --}}
  <section class="bg-white border border-red-200 rounded-2xl p-6 shadow-sm">
    <h2 class="text-lg font-bold text-red-700">Delete account</h2>
    <p class="text-sm text-slate-600 mt-1">
      This action is permanent. Please confirm your password.
    </p>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-6 space-y-4">
      @csrf
      @method('DELETE')

      <div>
        <label class="block text-sm font-medium text-slate-700">Password</label>
        <input
          type="password"
          name="password"
          required
          class="mt-1 w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-300"
        >
        @error('password')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <button class="bg-red-600 hover:bg-red-700 text-white font-bold px-5 py-3 rounded-xl shadow-lg shadow-red-600/20">
        Delete my account
      </button>
    </form>
  </section>

</main>

</body>
</html>
