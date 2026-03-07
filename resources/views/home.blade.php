<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aksara Coffee - {{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}. Street coffee shop terbaik dengan suasana malam yang nyaman.">
    <title>Aksara Coffee — {{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700,800,900&family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --brown-dark: #3E2723;
            --brown-primary: #6F4E37;
            --brown-light: #A67B5B;
            --cream: #F5F0E8;
            --cream-dark: #E8DCC8;
            --accent-gold: #D4A574;
            --text-dark: #3E2723;
        }

        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* Hero */
        .hero-section {
            background: linear-gradient(135deg, rgba(62,39,35,0.92) 0%, rgba(111,78,55,0.88) 50%, rgba(62,39,35,0.95) 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4A574' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            z-index: 0;
        }

        /* Floating */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .float-animation { animation: float 3s ease-in-out infinite; }

        /* Pulse glow */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(37,211,102,0.5); }
            50% { box-shadow: 0 0 20px 8px rgba(37,211,102,0.3); }
        }
        .pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }

        /* Fade in up */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .fade-delay-1 { animation-delay: 0.2s; opacity: 0; }
        .fade-delay-2 { animation-delay: 0.4s; opacity: 0; }
        .fade-delay-3 { animation-delay: 0.6s; opacity: 0; }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Grain texture */
        .grain::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Menu card */
        .menu-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(62,39,35,0.15);
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--cream); }
        ::-webkit-scrollbar-thumb { background: var(--brown-light); border-radius: 999px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--brown-primary); }

        /* Steam */
        @keyframes steam {
            0% { opacity: 0; transform: translateY(0) scaleX(1); }
            15% { opacity: 1; }
            50% { opacity: 0.6; transform: translateY(-20px) scaleX(1.2); }
            100% { opacity: 0; transform: translateY(-40px) scaleX(0.8); }
        }
        .steam { animation: steam 2.5s ease-out infinite; }
        .steam-delay-1 { animation-delay: 0.4s; }
        .steam-delay-2 { animation-delay: 0.8s; }

        /* Mobile menu transition */
        .mobile-menu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), opacity 0.3s ease;
        }
        .mobile-menu.open {
            max-height: 300px;
            opacity: 1;
        }

        /* Info card glass */
        .info-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 1.25rem;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        .info-card:hover {
            background: rgba(255,255,255,0.06);
            border-color: rgba(212,165,116,0.2);
        }

        /* Remove default focus styles from search input */
        #menuSearch,
        #menuSearch:focus,
        #menuSearch:focus-visible {
            outline: none !important;
            box-shadow: none !important;
            border: none !important;
        }

        #menuSearchClear {
            outline: none !important;
            border: none !important;
            background: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            cursor: pointer;
        }

        /* Menu detail modal */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(4px);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            transform: translateY(20px) scale(0.97);
            transition: transform 0.3s ease;
        }
        .modal-overlay.active .modal-content {
            transform: translateY(0) scale(1);
        }
    </style>
</head>
<body class="font-inter bg-[#F5F0E8] text-[#3E2723] antialiased">

    {{-- ======== NAVBAR ======== --}}
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <a href="#" class="flex items-center gap-2.5 shrink-0">
                    @if(!empty($settings['logo_path']))
                        <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffee" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full object-contain">
                    @else
                        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-[#D4A574] rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-base sm:text-lg">A</span>
                        </div>
                    @endif
                    <span class="font-playfair text-lg sm:text-xl font-bold text-white">Aksara Coffee</span>
                </a>

                <div class="hidden md:flex items-center gap-6 lg:gap-8">
                    <a href="#home" class="text-white/80 hover:text-white text-sm font-medium transition">Home</a>
                    <a href="#menu" class="text-white/80 hover:text-white text-sm font-medium transition">Menu</a>
                    <a href="#location" class="text-white/80 hover:text-white text-sm font-medium transition">Lokasi</a>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}" target="_blank"
                       class="bg-[#D4A574] hover:bg-[#C49464] text-white px-5 py-2 rounded-full text-sm font-medium transition shadow-lg hover:shadow-xl">
                        Pesan Sekarang
                    </a>
                </div>

                {{-- Mobile menu button --}}
                <button id="menuToggle" class="md:hidden text-white p-2 -mr-2 relative w-10 h-10 flex items-center justify-center" aria-label="Toggle menu">
                    <svg id="menuIconOpen" class="w-6 h-6 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="menuIconClose" class="w-6 h-6 absolute transition-transform scale-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div id="mobileMenu" class="mobile-menu md:hidden pb-3">
                <div class="bg-[#3E2723]/95 backdrop-blur-xl rounded-2xl p-3 space-y-1">
                    <a href="#home" class="block text-white/80 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">Home</a>
                    <a href="#menu" class="block text-white/80 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">Menu</a>
                    <a href="#location" class="block text-white/80 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">Lokasi</a>
                    <div class="pt-2 px-2">
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}" target="_blank"
                           class="block text-center bg-[#D4A574] hover:bg-[#C49464] text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- ======== HERO SECTION ======== --}}
    <section id="home" class="hero-section min-h-[80vh] sm:min-h-[85vh] flex items-center justify-center relative grain">
        <div class="relative z-10 text-center px-5 sm:px-6 max-w-4xl mx-auto pt-16 sm:pt-20 pb-16 sm:pb-20">
            {{-- Logo --}}
            <div class="mb-3 sm:mb-4 fade-in-up">
                @if(!empty($settings['logo_path']))
                    <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffee" class="w-24 h-24 sm:w-32 sm:h-32 mx-auto rounded-full object-contain float-animation border-4 border-[#D4A574]/30 shadow-2xl bg-white/10 backdrop-blur-sm p-2">
                @else
                    <div class="w-24 h-24 sm:w-32 sm:h-32 mx-auto rounded-full bg-gradient-to-br from-[#D4A574] to-[#A67B5B] flex items-center justify-center float-animation border-4 border-[#D4A574]/30 shadow-2xl">
                        <span class="text-white font-playfair text-4xl sm:text-5xl font-bold">A</span>
                    </div>
                @endif
            </div>

            {{-- Steam --}}
            <div class="flex justify-center gap-2 mb-3 sm:mb-4 fade-in-up fade-delay-1">
                <div class="w-1 h-5 sm:h-6 bg-[#D4A574]/40 rounded-full steam"></div>
                <div class="w-1 h-7 sm:h-8 bg-[#D4A574]/30 rounded-full steam steam-delay-1"></div>
                <div class="w-1 h-4 sm:h-5 bg-[#D4A574]/40 rounded-full steam steam-delay-2"></div>
            </div>

            <h1 class="font-playfair text-4xl sm:text-6xl lg:text-8xl font-bold text-white mb-4 sm:mb-6 fade-in-up fade-delay-1 leading-tight">
                Aksara
                <span class="text-[#D4A574]">Coffee</span>
            </h1>

            <div class="fade-in-up fade-delay-2">
                <p class="text-base sm:text-xl lg:text-2xl text-[#D7CCC8] font-light italic max-w-2xl mx-auto mb-1 sm:mb-2 px-2">
                    "{{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}"
                </p>
                <div class="flex items-center justify-center gap-3 mt-4 sm:mt-6 mb-6 sm:mb-8">
                    <div class="h-px w-8 sm:w-12 bg-[#D4A574]/40"></div>
                    <span class="text-[#D4A574] text-xs sm:text-sm tracking-[0.3em] uppercase font-medium">Street Coffee</span>
                    <div class="h-px w-8 sm:w-12 bg-[#D4A574]/40"></div>
                </div>
            </div>

            <div class="fade-in-up fade-delay-3 flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
                <a href="#menu" class="w-full sm:w-auto bg-[#D4A574] hover:bg-[#C49464] text-white px-8 py-3 sm:py-3.5 rounded-full text-sm font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Lihat Menu
                </a>
                <a href="#location" class="w-full sm:w-auto border-2 border-[#D4A574]/50 hover:border-[#D4A574] text-white px-8 py-3 sm:py-3.5 rounded-full text-sm font-semibold transition hover:bg-[#D4A574]/10 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Lokasi Kami
                </a>
            </div>

            {{-- Operating hours --}}
            <div class="fade-in-up fade-delay-3 mt-8 sm:mt-10">
                <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full px-4 sm:px-5 py-2 sm:py-2.5">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-xs sm:text-sm text-[#D7CCC8]">Buka {{ $settings['operating_hours'] ?? '18.30 WIB - 24.00 WIB (Every Day)' }}</span>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-6 sm:bottom-8 left-1/2 -translate-x-1/2 z-10">
            <a href="#menu" class="text-white/40 hover:text-white/70 transition">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </a>
        </div>
    </section>

    {{-- ======== MENU SECTION ======== --}}
    <section id="menu" class="py-14 sm:py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section header --}}
            <div class="text-center mb-10 sm:mb-16 reveal">
                <span class="text-[#D4A574] text-xs sm:text-sm tracking-[0.3em] uppercase font-semibold">Our Menu</span>
                <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-[#3E2723] mt-2 sm:mt-3">Pilihan Menu Kami</h2>
                <div class="flex items-center justify-center gap-3 mt-3 sm:mt-4">
                    <div class="h-px w-10 sm:w-16 bg-[#D4A574]/40"></div>
                    <div class="w-2 h-2 bg-[#D4A574] rounded-full"></div>
                    <div class="h-px w-10 sm:w-16 bg-[#D4A574]/40"></div>
                </div>
                <p class="text-[#8D6E63] mt-3 sm:mt-4 max-w-xl mx-auto text-sm sm:text-base px-2">Nikmati beragam pilihan minuman yang kami racik dengan penuh cinta dan dedikasi</p>

                {{-- Search Bar --}}
                <div class="mt-6 sm:mt-8 max-w-md mx-auto px-2">
                    <div class="flex items-center gap-0 bg-white border border-[#E8DCC8] rounded-full shadow-sm focus-within:border-[#D4A574] focus-within:ring-2 focus-within:ring-[#D4A574]/20 transition">
                        <span class="pl-4 sm:pl-5 flex items-center shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-[#8D6E63]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <input id="menuSearch" type="text" placeholder="Cari menu..." class="w-full bg-transparent py-2.5 sm:py-3 pl-2.5 sm:pl-3 pr-1 text-[#3E2723] text-sm sm:text-base placeholder-[#8D6E63]/50" />
                        <button id="menuSearchClear" type="button" class="hidden mr-3 sm:mr-4 w-5 h-5 sm:w-6 sm:h-6 shrink-0 items-center justify-center rounded-full bg-[#8D6E63]/10 hover:bg-[#8D6E63]/20 text-[#8D6E63] hover:text-[#3E2723] transition" style="display:none;">
                            <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- No results message --}}
            <div id="menuNoResults" class="hidden text-center py-12 sm:py-16">
                <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto text-[#D4A574]/40 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <p class="text-[#8D6E63] text-sm sm:text-base">Menu tidak ditemukan</p>
                <p class="text-[#8D6E63]/60 text-xs sm:text-sm mt-1">Coba kata kunci lain</p>
            </div>

            @foreach($categories as $category)
                <div class="mb-12 sm:mb-16 last:mb-0 reveal">
                    {{-- Category Header --}}
                    <div class="flex items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                        <!-- icon sementara -->
                        <!-- <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-[#6F4E37] to-[#D4A574] rounded-xl sm:rounded-2xl flex items-center justify-center shadow-lg shrink-0">
                            @if(strtolower($category->name) === 'coffee')
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            @else
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            @endif
                        </div> -->
                        <div>
                            <h3 class="font-playfair text-xl sm:text-2xl lg:text-3xl font-bold text-[#3E2723]">{{ $category->name }}</h3>
                            <p class="text-xs sm:text-sm text-[#8D6E63]">{{ $category->menus->count() }} item tersedia</p>
                        </div>
                    </div>

                    {{-- Menu Grid — 2 cols on mobile, 2 on sm, 3 on md, 4 on lg --}}
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">
                        @foreach($category->menus as $menu)
                            <div class="menu-card bg-white rounded-xl sm:rounded-2xl border border-[#E8DCC8] overflow-hidden group cursor-pointer"
                                 data-menu-name="{{ strtolower($menu->name) }}"
                                 data-menu-title="{{ $menu->name }}"
                                 data-menu-desc="{{ $menu->description ?? '' }}"
                                 data-menu-price="{{ $menu->formatted_price }}"
                                 data-menu-discount-price="{{ $menu->formatted_discount_price ?? '' }}"
                                 data-menu-has-discount="{{ $menu->has_discount ? '1' : '0' }}"
                                 data-menu-image="{{ $menu->image ? asset('storage/' . $menu->image) : '' }}"
                                 data-menu-category="{{ $category->name }}"
                                 onclick="openMenuModal(this)">
                                {{-- Image --}}
                                <div class="relative h-32 sm:h-44 lg:h-48 overflow-hidden bg-gradient-to-br from-[#E8DCC8] to-[#F5F0E8]">
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-8 h-8 sm:w-12 sm:h-12 text-[#D4A574]/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    {{-- Price badge --}}
                                    <div class="absolute top-2 right-2 sm:top-3 sm:right-3 bg-[#3E2723]/90 text-[#D4A574] backdrop-blur-sm px-2 sm:px-3 py-0.5 sm:py-1 rounded-full text-xs sm:text-sm font-semibold">
                                        @if($menu->has_discount)
                                            <span class="line-through text-[#D4A574]/50 text-[10px] sm:text-xs">{{ $menu->formatted_price }}</span>
                                            <span>{{ $menu->formatted_discount_price }}</span>
                                        @else
                                            {{ $menu->formatted_price }}
                                        @endif
                                    </div>
                                </div>
                                {{-- Info --}}
                                <div class="p-3 sm:p-5">
                                    <h4 class="font-playfair text-sm sm:text-lg font-bold text-[#3E2723] group-hover:text-[#6F4E37] transition leading-snug">{{ $menu->name }}</h4>
                                    @if($menu->description)
                                        <p class="hidden sm:block text-sm text-[#8D6E63] mt-1.5 line-clamp-2">{{ $menu->description }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ======== LOCATION SECTION ======== --}}
    <section id="location" class="py-14 sm:py-20 lg:py-28 bg-[#3E2723] relative grain">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Section header --}}
            <div class="text-center mb-10 sm:mb-16 reveal">
                <span class="text-[#D4A574] text-xs sm:text-sm tracking-[0.3em] uppercase font-semibold">Find Us</span>
                <h2 class="font-playfair text-3xl sm:text-4xl lg:text-5xl font-bold text-white mt-2 sm:mt-3">Lokasi & Jam Operasional</h2>
                <div class="flex items-center justify-center gap-3 mt-3 sm:mt-4">
                    <div class="h-px w-10 sm:w-16 bg-[#D4A574]/40"></div>
                    <div class="w-2 h-2 bg-[#D4A574] rounded-full"></div>
                    <div class="h-px w-10 sm:w-16 bg-[#D4A574]/40"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-10">
                {{-- Map --}}
                <div class="rounded-2xl overflow-hidden border-2 border-[#5D4037] shadow-2xl reveal">
                    @if(!empty($settings['location_map_embed']))
                        <div class="aspect-[4/3] sm:aspect-video">
                            {!! $settings['location_map_embed'] !!}
                        </div>
                    @else
                        <div class="aspect-[4/3] sm:aspect-video bg-[#4E342E] flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto text-[#8D6E63] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <p class="text-[#8D6E63] text-sm sm:text-base">Google Maps Placeholder</p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Info cards --}}
                <div class="flex flex-col justify-center gap-4 sm:gap-5 reveal">
                    {{-- Address --}}
                    <div class="info-card flex gap-3 sm:gap-4">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 bg-[#D4A574]/10 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7 text-[#D4A574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-playfair text-lg sm:text-xl font-bold text-white mb-1">Alamat</h3>
                            <p class="text-[#D7CCC8] text-sm sm:text-base break-words">{{ $settings['location_address'] ?? 'Alamat belum diatur' }}</p>
                        </div>
                    </div>

                    {{-- Hours --}}
                    <div class="info-card flex gap-3 sm:gap-4">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 bg-[#D4A574]/10 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7 text-[#D4A574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-playfair text-lg sm:text-xl font-bold text-white mb-1">Jam Operasional</h3>
                            <p class="text-[#D7CCC8] text-sm sm:text-lg">{{ $settings['operating_hours'] ?? '18.30 WIB - 24.00 WIB (Every Day)' }}</p>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-green-400 text-xs sm:text-sm font-medium">Buka Setiap Hari</span>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp CTA --}}
                    <div class="info-card flex gap-3 sm:gap-4">
                        <div class="w-11 h-11 sm:w-14 sm:h-14 bg-green-500/10 rounded-xl sm:rounded-2xl flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 sm:w-7 sm:h-7 text-green-400" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-playfair text-lg sm:text-xl font-bold text-white mb-2">Pesan via WhatsApp</h3>
                            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}?text=Halo%20Aksara%20Coffee,%20saya%20ingin%20memesan" target="_blank"
                               class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 sm:px-6 py-2.5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Chat Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== FOOTER ======== --}}
    <footer class="bg-[#2C1A14] py-10 sm:py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center gap-2.5 sm:gap-3 mb-4">
                    @if(!empty($settings['logo_path']))
                        <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffee" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-contain">
                    @endif
                    <span class="font-playfair text-lg sm:text-xl font-bold text-white">Aksara Coffee</span>
                </div>
                <p class="text-[#8D6E63] italic mb-5 sm:mb-6 text-sm sm:text-base">"{{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}"</p>

                {{-- Social Media --}}
                @if(!empty($settings['instagram_url']) || !empty($settings['tiktok_url']))
                <div class="flex items-center justify-center gap-3 pt-2 sm:gap-4 mb-4 sm:mb-6">
                    @if(!empty($settings['instagram_url']))
                        <a href="{{ $settings['instagram_url'] }}" target="_blank" rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-[#3E2723] border border-[#5D4037] flex items-center justify-center text-[#D4A574] hover:bg-[#D4A574] hover:text-white transition-all transform hover:-translate-y-1" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    @if(!empty($settings['tiktok_url']))
                        <a href="{{ $settings['tiktok_url'] }}" target="_blank" rel="noopener noreferrer"
                           class="w-10 h-10 rounded-full bg-[#3E2723] border border-[#5D4037] flex items-center justify-center text-[#D4A574] hover:bg-[#D4A574] hover:text-white transition-all transform hover:-translate-y-1" aria-label="TikTok">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1.04-.1z" />
                            </svg>
                        </a>
                    @endif
                </div>
                @endif

                <div class="h-px w-20 sm:w-24 bg-[#5D4037] mx-auto mb-4"></div>
                <p class="text-[#8D6E63] text-xs sm:text-sm">&copy; {{ date('Y') }} Aksara Coffee. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ======== MENU DETAIL MODAL ======== --}}
    <div id="menuModal" class="modal-overlay" onclick="if(event.target===this)closeMenuModal()">
        <div class="modal-content bg-white rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden w-full max-w-md sm:max-w-lg max-h-[90vh] flex flex-col">
            {{-- Modal image --}}
            <div id="modalImageWrap" class="relative h-48 sm:h-64 bg-gradient-to-br from-[#E8DCC8] to-[#F5F0E8] shrink-0">
                <img id="modalImage" src="" alt="" class="w-full h-full object-cover" />
                <div id="modalNoImage" class="w-full h-full flex items-center justify-center hidden">
                    <svg class="w-16 h-16 text-[#D4A574]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                {{-- Close button --}}
                <button onclick="closeMenuModal()" class="absolute top-3 right-3 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-black/40 backdrop-blur-sm text-white flex items-center justify-center hover:bg-black/60 transition" style="border:none;outline:none;cursor:pointer;">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                {{-- Price badge --}}
                <div id="modalPrice" class="absolute bottom-3 left-4 bg-[#3E2723]/90 text-[#D4A574] backdrop-blur-sm px-3 sm:px-4 py-1 sm:py-1.5 rounded-full text-sm sm:text-base font-bold flex items-center gap-2"></div>
            </div>
            {{-- Modal body --}}
            <div class="p-5 sm:p-7 overflow-y-auto">
                <span id="modalCategory" class="text-[#D4A574] text-xs tracking-[0.2em] uppercase font-semibold"></span>
                <h3 id="modalTitle" class="font-playfair text-xl sm:text-2xl font-bold text-[#3E2723] mt-1"></h3>
                <div id="modalDescWrap" class="mt-3 sm:mt-4">
                    <p id="modalDesc" class="text-[#8D6E63] text-sm sm:text-base leading-relaxed"></p>
                </div>
                <div id="modalNoDesc" class="mt-3 sm:mt-4 hidden">
                    <p class="text-[#8D6E63]/50 text-sm italic">Belum ada deskripsi untuk menu ini.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ======== FLOATING WHATSAPP BUTTON ======== --}}
    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}?text=Halo%20Aksara%20Coffee,%20saya%20ingin%20memesan"
       target="_blank"
       id="waButton"
       class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-14 h-14 sm:w-16 sm:h-16 rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 transform hover:scale-110 pulse-glow group"
       title="Pesan via WhatsApp"
       aria-label="Pesan via WhatsApp">
        <svg class="w-7 h-7 sm:w-8 sm:h-8" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        {{-- Tooltip — hidden on mobile --}}
        <span class="hidden sm:block absolute right-20 bg-[#3E2723] text-white text-sm px-4 py-2 rounded-xl whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity shadow-xl pointer-events-none">
            Pesan via WhatsApp
        </span>
    </a>

    {{-- ======== SCRIPTS ======== --}}
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 60) {
                navbar.style.background = 'rgba(62,39,35,0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.15)';
            } else {
                navbar.style.background = 'transparent';
                navbar.style.backdropFilter = 'none';
                navbar.style.boxShadow = 'none';
            }
        });

        // Mobile menu toggle with smooth animation
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('menuIconOpen');
        const iconClose = document.getElementById('menuIconClose');

        menuToggle.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.toggle('open');
            iconOpen.style.transform = isOpen ? 'scale(0)' : 'scale(1)';
            iconClose.style.transform = isOpen ? 'scale(1)' : 'scale(0)';
        });

        // Close mobile menu on link click
        mobileMenu.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('open');
                iconOpen.style.transform = 'scale(1)';
                iconClose.style.transform = 'scale(0)';
            });
        });

        // Scroll reveal animation
        function revealOnScroll() {
            var reveals = document.querySelectorAll('.reveal');
            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var revealTop = reveals[i].getBoundingClientRect().top;
                var revealPoint = 120;
                if (revealTop < windowHeight - revealPoint) {
                    reveals[i].classList.add('active');
                }
            }
        }
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Menu search
        const menuSearch = document.getElementById('menuSearch');
        const menuSearchClear = document.getElementById('menuSearchClear');
        const menuNoResults = document.getElementById('menuNoResults');

        menuSearch.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            menuSearchClear.style.display = query.length > 0 ? 'flex' : 'none';

            const cards = document.querySelectorAll('.menu-card');
            let totalVisible = 0;

            cards.forEach(function(card) {
                const name = card.getAttribute('data-menu-name') || '';
                const match = !query || name.includes(query);
                card.style.display = match ? '' : 'none';
                if (match) totalVisible++;
            });

            // Hide empty category sections
            document.querySelectorAll('#menu .reveal').forEach(function(section) {
                if (!section.querySelector('.grid')) return;
                const visibleCards = section.querySelectorAll('.menu-card:not([style*="display: none"])');
                section.style.display = visibleCards.length > 0 ? '' : 'none';
            });

            menuNoResults.classList.toggle('hidden', totalVisible > 0);
        });

        menuSearchClear.addEventListener('click', function() {
            menuSearch.value = '';
            menuSearch.dispatchEvent(new Event('input'));
            menuSearch.focus();
        });

        // Menu detail modal
        const menuModal = document.getElementById('menuModal');

        function openMenuModal(card) {
            const title = card.getAttribute('data-menu-title');
            const desc = card.getAttribute('data-menu-desc');
            const price = card.getAttribute('data-menu-price');
            const discountPrice = card.getAttribute('data-menu-discount-price');
            const hasDiscount = card.getAttribute('data-menu-has-discount') === '1';
            const image = card.getAttribute('data-menu-image');
            const category = card.getAttribute('data-menu-category');

            document.getElementById('modalTitle').textContent = title;
            const modalPriceEl = document.getElementById('modalPrice');
            if (hasDiscount && discountPrice) {
                modalPriceEl.innerHTML = '<span style="text-decoration:line-through;opacity:0.5;font-size:0.75em;">' + price + '</span> <span>' + discountPrice + '</span>';
            } else {
                modalPriceEl.textContent = price;
            }
            document.getElementById('modalCategory').textContent = category;

            const modalImage = document.getElementById('modalImage');
            const modalNoImage = document.getElementById('modalNoImage');
            if (image) {
                modalImage.src = image;
                modalImage.alt = title;
                modalImage.style.display = '';
                modalNoImage.style.display = 'none';
            } else {
                modalImage.style.display = 'none';
                modalNoImage.style.display = 'flex';
            }

            const modalDesc = document.getElementById('modalDesc');
            const modalDescWrap = document.getElementById('modalDescWrap');
            const modalNoDesc = document.getElementById('modalNoDesc');
            if (desc && desc.trim()) {
                modalDesc.textContent = desc;
                modalDescWrap.style.display = '';
                modalNoDesc.style.display = 'none';
            } else {
                modalDescWrap.style.display = 'none';
                modalNoDesc.style.display = '';
            }

            menuModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMenuModal() {
            menuModal.classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeMenuModal();
        });
    </script>
</body>
</html>
