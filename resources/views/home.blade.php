<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Social Dashboard - Light Theme</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background-color: #E2E8F0; font-family: 'Inter', sans-serif; }
  </style>
</head>

<!-- ✅ تغييرات مهمة:
  1) حيدنا flex و justify-center من body
  2) زدنا w-screen و min-h-screen
  3) حيدنا max-w-7xl باش يشد العرض كامل
-->
<body class="w-screen min-h-screen p-4 md:p-8">

  <div class="w-full min-h-[calc(100vh-2rem)] md:min-h-[calc(100vh-4rem)] bg-[#F0F4F8] rounded-[40px] shadow-2xl overflow-hidden flex flex-col">

    <header class="bg-white/70 px-8 py-4 flex items-center justify-between border-b border-gray-100">
      <div class="flex items-center gap-4">
        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
          <i class="fa-solid fa-bolt text-xl"></i>
        </div>
        <div class="relative">
          <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400 text-sm"></i>
          <input type="text" placeholder="Search..."
            class="pl-10 pr-4 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 w-64">
        </div>
      </div>

      <nav class="flex items-center gap-8 text-gray-500">
        <i class="fa-solid fa-house cursor-pointer hover:text-blue-600"></i>
        <i class="fa-solid fa-user-group cursor-pointer hover:text-blue-600"></i>
        <i class="fa-solid fa-envelope cursor-pointer hover:text-blue-600"></i>
        <div class="relative">
          <i class="fa-solid fa-bell cursor-pointer hover:text-blue-600"></i>
          <span class="absolute -top-1 -right-1 bg-red-500 w-2 h-2 rounded-full"></span>
        </div>
      </nav>

      <div class="flex items-center gap-3">
        <span class="text-sm font-semibold text-gray-700">Alex Chen</span>
        <img src="https://i.pravatar.cc/150?u=alex" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
      </div>
    </header>

    <!-- ✅ خليّنا المحتوى يتمدّد وياخذ المساحة -->
    <div class="flex-1 p-6 gap-6 flex">

      <!-- Left -->
      <aside class="w-1/4 flex flex-col gap-6">
        <div class="bg-white rounded-[30px] overflow-hidden shadow-sm">
          <div class="h-24 bg-gradient-to-r from-blue-400 to-blue-200"></div>
          <div class="px-6 pb-6 text-center -mt-12">
            <img src="https://i.pravatar.cc/150?u=alex" class="w-24 h-24 rounded-full border-4 border-white mx-auto mb-4">
            <h2 class="text-xl font-bold text-gray-800">Alex Chen</h2>
            <p class="text-xs text-gray-400 mb-4">alex.chen@example.com</p>
            <button class="w-full py-2 bg-blue-50 text-blue-600 rounded-xl text-sm font-semibold hover:bg-blue-100 transition">
              View Profile
            </button>
          </div>
        </div>

        <div class="bg-white rounded-[30px] p-6 shadow-sm flex-1">
          <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">My Friends</h3>
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/150?u=sarah" class="w-8 h-8 rounded-full">
                <span class="text-sm font-medium text-gray-700">Sarah Lee</span>
              </div>
              <span class="w-2 h-2 bg-green-400 rounded-full"></span>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/150?u=mike" class="w-8 h-8 rounded-full">
                <span class="text-sm font-medium text-gray-700">Michael Kim</span>
              </div>
              <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <img src="https://i.pravatar.cc/150?u=david" class="w-8 h-8 rounded-full">
                <span class="text-sm font-medium text-gray-700">David Chen</span>
              </div>
              <span class="w-2 h-2 bg-green-400 rounded-full"></span>
            </div>
          </div>
        </div>
      </aside>

      <!-- Center -->
      <main class="w-2/4 flex flex-col gap-6">
        <div class="bg-white rounded-[30px] p-4 shadow-sm flex items-center gap-4">
          <img src="https://i.pravatar.cc/150?u=alex" class="w-10 h-10 rounded-full">
          <input type="text" placeholder="Share a post..." class="flex-1 bg-gray-50 rounded-2xl px-6 py-3 text-sm focus:outline-none">
          <button class="p-3 bg-blue-600 text-white rounded-2xl hover:scale-105 transition">
            <i class="fa-solid fa-paper-plane"></i>
          </button>
        </div>

        <div class="bg-white rounded-[30px] overflow-hidden shadow-sm">
          <div class="p-6">
            <div class="flex items-center gap-3 mb-4">
              <img src="https://i.pravatar.cc/150?u=sarah" class="w-10 h-10 rounded-full">
              <div>
                <h4 class="text-sm font-bold text-gray-800">Sarah Lee</h4>
                <p class="text-[10px] text-gray-400">Product Designer • 2h ago</p>
              </div>
            </div>
            <p class="text-sm text-gray-600 mb-4 leading-relaxed">
              Just finished the new dashboard design system! Focused on accessibility and soft UI patterns. What do you think? 🎨✨
            </p>
            <img src="https://images.unsplash.com/photo-1586717791821-3f44a563dc4c?auto=format&fit=crop&q=80&w=800"
              class="rounded-2xl w-full h-64 object-cover">
          </div>
          <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
            <div class="flex gap-6 text-gray-500 text-sm">
              <span class="flex items-center gap-2 cursor-pointer hover:text-blue-600"><i class="fa-regular fa-heart"></i> 12</span>
              <span class="flex items-center gap-2 cursor-pointer hover:text-blue-600"><i class="fa-regular fa-comment"></i> 60</span>
            </div>
            <i class="fa-solid fa-share-nodes text-gray-400 cursor-pointer hover:text-blue-600"></i>
          </div>
        </div>
      </main>

      <!-- Right -->
      <aside class="w-1/4 flex flex-col gap-6">
        <div class="bg-white rounded-[30px] p-6 shadow-sm">
          <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Trending Topics</h3>
          <ul class="space-y-4">
            <li class="flex items-start gap-3 group cursor-pointer">
              <div class="bg-blue-50 p-2 rounded-lg text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">#UIUX</div>
              <div>
                <p class="text-sm font-semibold text-gray-700 leading-tight">Modern Dashboard Design</p>
                <p class="text-[10px] text-gray-400">2.4k posts</p>
              </div>
            </li>
            <li class="flex items-start gap-3 group cursor-pointer">
              <div class="bg-blue-50 p-2 rounded-lg text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">#Tech</div>
              <div>
                <p class="text-sm font-semibold text-gray-700 leading-tight">The future of AI</p>
                <p class="text-[10px] text-gray-400">1.8k posts</p>
              </div>
            </li>
          </ul>
        </div>
      </aside>

    </div>
  </div>
</body>
</html>
