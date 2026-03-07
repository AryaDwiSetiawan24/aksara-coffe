<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — Aksara Coffee</title>

    @php $faviconPath = \App\Models\SiteSetting::get('logo_path'); @endphp
    @if($faviconPath)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $faviconPath) }}">
        <link rel="apple-touch-icon" href="{{ asset('storage/' . $faviconPath) }}">
    @endif
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#F5F0E8]">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-[#3E2723] text-white flex-shrink-0 hidden md:flex flex-col sticky top-0 h-dvh">
            <div class="p-6 border-b border-[#5D4037]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <span class="text-xl font-bold tracking-wide">☕ Aksara Coffee</span>
                </a>
                <p class="text-xs text-[#D7CCC8] mt-1">Admin Panel</p>
            </div>
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.dashboard') ? 'bg-[#6F4E37] text-white' : 'text-[#D7CCC8] hover:bg-[#4E342E] hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.categories.*') ? 'bg-[#6F4E37] text-white' : 'text-[#D7CCC8] hover:bg-[#4E342E] hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    Kategori
                </a>
                <a href="{{ route('admin.menus.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.menus.*') ? 'bg-[#6F4E37] text-white' : 'text-[#D7CCC8] hover:bg-[#4E342E] hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Menu
                </a>
                <a href="{{ route('admin.settings.edit') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.settings.*') ? 'bg-[#6F4E37] text-white' : 'text-[#D7CCC8] hover:bg-[#4E342E] hover:text-white' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </a>
            </nav>
            <div class="p-4 border-t border-[#5D4037]">
                <a href="{{ route('home') }}" target="_blank"
                   class="flex items-center gap-2 px-4 py-2 text-sm text-[#D7CCC8] hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Website
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm text-[#D7CCC8] hover:text-red-300 transition w-full">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Top Bar (Mobile) --}}
            <div class="md:hidden bg-[#3E2723] text-white p-4 flex items-center justify-between sticky top-0 z-40">
                <span class="font-bold">☕ Aksara Coffee</span>
                <button onclick="toggleMobileSidebar()" class="p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            {{-- Mobile Sidebar Overlay --}}
            <div id="sidebarContainer" class="md:hidden fixed inset-0 z-50 overflow-hidden pointer-events-none">
                <div id="sidebarOverlay" class="absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-300" onclick="toggleMobileSidebar()"></div>
                
                <div id="mobileSidebar" class="absolute top-0 left-0 bottom-0 w-64 bg-[#3E2723] text-white flex flex-col transform -translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto">
                    <div class="p-5 border-b border-[#5D4037] flex items-center justify-between">
                        <span class="font-bold text-lg">☕ Aksara Coffee</span>
                        <button onclick="toggleMobileSidebar()" class="text-[#D7CCC8] hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                    
                    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-[#6F4E37] text-white font-medium' : 'text-[#D7CCC8] hover:bg-[#4E342E]' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z"/></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.categories.*') ? 'bg-[#6F4E37] text-white font-medium' : 'text-[#D7CCC8] hover:bg-[#4E342E]' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            Kategori
                        </a>
                        <a href="{{ route('admin.menus.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.menus.*') ? 'bg-[#6F4E37] text-white font-medium' : 'text-[#D7CCC8] hover:bg-[#4E342E]' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Menu
                        </a>
                        <a href="{{ route('admin.settings.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm {{ request()->routeIs('admin.settings.*') ? 'bg-[#6F4E37] text-white font-medium' : 'text-[#D7CCC8] hover:bg-[#4E342E]' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Pengaturan
                        </a>
                    </nav>

                    <div class="p-4 border-t border-[#5D4037]">
                        <a href="{{ route('home') }}" target="_blank"
                           class="flex items-center gap-2 px-4 py-2 text-sm text-[#D7CCC8] hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            Lihat Website
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm text-[#D7CCC8] hover:text-red-300 transition w-full">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Page Content --}}
            <div class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
    <script>
        function toggleMobileSidebar() {
            const container = document.getElementById('sidebarContainer');
            const overlay = document.getElementById('sidebarOverlay');
            const sidebar = document.getElementById('mobileSidebar');
            
            // If open, close it
            if (!container.classList.contains('pointer-events-none')) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                
                // Wait for animation to finish before removing pointer events
                setTimeout(() => {
                    container.classList.add('pointer-events-none');
                }, 300);
            } 
            // If closed, open it
            else {
                container.classList.remove('pointer-events-none');
                // Small delay to ensure display:block takes effect before animating
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    sidebar.classList.remove('-translate-x-full');
                }, 10);
            }
        }
    </script>
</body>
</html>
