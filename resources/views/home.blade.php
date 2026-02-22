<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aksara Coffe - {{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}. Street coffee shop terbaik dengan suasana malam yang nyaman.">
    <title>Aksara Coffe — {{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}</title>

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

        /* Hero parallax effect */
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

        /* Floating animation */
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

        /* Grain texture */
        .grain::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* Menu card hover */
        .menu-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(62,39,35,0.15);
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--cream); }
        ::-webkit-scrollbar-thumb { background: var(--brown-light); border-radius: 999px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--brown-primary); }

        /* Coffee steam animation */
        @keyframes steam {
            0% { opacity: 0; transform: translateY(0) scaleX(1); }
            15% { opacity: 1; }
            50% { opacity: 0.6; transform: translateY(-20px) scaleX(1.2); }
            100% { opacity: 0; transform: translateY(-40px) scaleX(0.8); }
        }
        .steam { animation: steam 2.5s ease-out infinite; }
        .steam-delay-1 { animation-delay: 0.4s; }
        .steam-delay-2 { animation-delay: 0.8s; }
    </style>
</head>
<body class="font-inter bg-[#F5F0E8] text-[#3E2723] antialiased">

    {{-- ======== NAVBAR ======== --}}
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="#" class="flex items-center gap-3">
                    @if(!empty($settings['logo_path']))
                        <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffe" class="w-10 h-10 rounded-full object-contain">
                    @else
                        <div class="w-10 h-10 bg-[#D4A574] rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">A</span>
                        </div>
                    @endif
                    <span class="font-playfair text-xl font-bold text-white">Aksara Coffe</span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="#home" class="text-white/80 hover:text-white text-sm font-medium transition">Home</a>
                    <a href="#menu" class="text-white/80 hover:text-white text-sm font-medium transition">Menu</a>
                    <a href="#location" class="text-white/80 hover:text-white text-sm font-medium transition">Lokasi</a>
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}" target="_blank"
                       class="bg-[#D4A574] hover:bg-[#C49464] text-white px-5 py-2 rounded-full text-sm font-medium transition shadow-lg hover:shadow-xl">
                        Pesan Sekarang
                    </a>
                </div>

                {{-- Mobile menu button --}}
                <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" class="md:hidden text-white p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            {{-- Mobile menu --}}
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <div class="bg-[#3E2723]/95 backdrop-blur-xl rounded-2xl p-4 space-y-2">
                    <a href="#home" class="block text-white/80 hover:text-white px-4 py-2 rounded-lg text-sm">Home</a>
                    <a href="#menu" class="block text-white/80 hover:text-white px-4 py-2 rounded-lg text-sm">Menu</a>
                    <a href="#location" class="block text-white/80 hover:text-white px-4 py-2 rounded-lg text-sm">Lokasi</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ======== HERO SECTION ======== --}}
    <section id="home" class="hero-section min-h-[85vh] flex items-center justify-center relative grain">
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto pt-20">
            {{-- Logo --}}
            <div class="mb-4 fade-in-up">
                @if(!empty($settings['logo_path']))
                    <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffe" class="w-32 h-32 mx-auto rounded-full object-contain float-animation border-4 border-[#D4A574]/30 shadow-2xl bg-white/10 backdrop-blur-sm p-2">
                @else
                    <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-[#D4A574] to-[#A67B5B] flex items-center justify-center float-animation border-4 border-[#D4A574]/30 shadow-2xl">
                        <span class="text-white font-playfair text-5xl font-bold">A</span>
                    </div>
                @endif
            </div>

            {{-- Coffee steam effect --}}
            <div class="flex justify-center gap-2 mb-4 fade-in-up fade-delay-1">
                <div class="w-1 h-6 bg-[#D4A574]/40 rounded-full steam"></div>
                <div class="w-1 h-8 bg-[#D4A574]/30 rounded-full steam steam-delay-1"></div>
                <div class="w-1 h-5 bg-[#D4A574]/40 rounded-full steam steam-delay-2"></div>
            </div>

            <h1 class="font-playfair text-5xl sm:text-6xl lg:text-8xl font-bold text-white mb-6 fade-in-up fade-delay-1 leading-tight">
                Aksara
                <span class="text-[#D4A574]">Coffe</span>
            </h1>

            <div class="fade-in-up fade-delay-2">
                <p class="text-lg sm:text-xl lg:text-2xl text-[#D7CCC8] font-light italic max-w-2xl mx-auto mb-2">
                    "{{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}"
                </p>
                <div class="flex items-center justify-center gap-3 mt-6 mb-8">
                    <div class="h-px w-12 bg-[#D4A574]/40"></div>
                    <span class="text-[#D4A574] text-sm tracking-[0.3em] uppercase font-medium">Street Coffee</span>
                    <div class="h-px w-12 bg-[#D4A574]/40"></div>
                </div>
            </div>

            <div class="fade-in-up fade-delay-3 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#menu" class="bg-[#D4A574] hover:bg-[#C49464] text-white px-8 py-3.5 rounded-full text-sm font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Lihat Menu
                </a>
                <a href="#location" class="border-2 border-[#D4A574]/50 hover:border-[#D4A574] text-white px-8 py-3.5 rounded-full text-sm font-semibold transition hover:bg-[#D4A574]/10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Lokasi Kami
                </a>
            </div>

            {{-- Operating hours badge --}}
            <div class="fade-in-up fade-delay-3 mt-10">
                <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full px-5 py-2.5">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm text-[#D7CCC8]">Buka {{ $settings['operating_hours'] ?? '18.30 WIB - 24.00 WIB (Every Day)' }}</span>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
            <a href="#menu" class="text-white/40 hover:text-white/70 transition">
                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </a>
        </div>
    </section>

    {{-- ======== MENU SECTION ======== --}}
    <section id="menu" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section header --}}
            <div class="text-center mb-16">
                <span class="text-[#D4A574] text-sm tracking-[0.3em] uppercase font-semibold">Our Menu</span>
                <h2 class="font-playfair text-4xl sm:text-5xl font-bold text-[#3E2723] mt-3">Pilihan Menu Kami</h2>
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="h-px w-16 bg-[#D4A574]/40"></div>
                    <div class="w-2 h-2 bg-[#D4A574] rounded-full"></div>
                    <div class="h-px w-16 bg-[#D4A574]/40"></div>
                </div>
                <p class="text-[#8D6E63] mt-4 max-w-xl mx-auto">Nikmati beragam pilihan minuman yang kami racik dengan penuh cinta dan dedikasi</p>
            </div>

            @foreach($categories as $category)
                <div class="mb-16 last:mb-0">
                    {{-- Category Header --}}
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#6F4E37] to-[#D4A574] rounded-2xl flex items-center justify-center shadow-lg">
                            @if(strtolower($category->name) === 'coffee')
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-playfair text-2xl sm:text-3xl font-bold text-[#3E2723]">{{ $category->name }}</h3>
                            <p class="text-sm text-[#8D6E63]">{{ $category->menus->count() }} item tersedia</p>
                        </div>
                    </div>

                    {{-- Menu Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach($category->menus as $menu)
                            <div class="menu-card bg-white rounded-2xl border border-[#E8DCC8] overflow-hidden group">
                                {{-- Image --}}
                                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#E8DCC8] to-[#F5F0E8]">
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <div class="text-center">
                                                <svg class="w-12 h-12 mx-auto text-[#D4A574]/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Price badge --}}
                                    <div class="absolute top-3 right-3 bg-[#3E2723]/90 text-[#D4A574] backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $menu->formatted_price }}
                                    </div>
                                </div>
                                {{-- Info --}}
                                <div class="p-5">
                                    <h4 class="font-playfair text-lg font-bold text-[#3E2723] group-hover:text-[#6F4E37] transition">{{ $menu->name }}</h4>
                                    @if($menu->description)
                                        <p class="text-sm text-[#8D6E63] mt-1.5 line-clamp-2">{{ $menu->description }}</p>
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
    <section id="location" class="py-20 lg:py-28 bg-[#3E2723] relative grain">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Section header --}}
            <div class="text-center mb-16">
                <span class="text-[#D4A574] text-sm tracking-[0.3em] uppercase font-semibold">Find Us</span>
                <h2 class="font-playfair text-4xl sm:text-5xl font-bold text-white mt-3">Lokasi & Jam Operasional</h2>
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="h-px w-16 bg-[#D4A574]/40"></div>
                    <div class="w-2 h-2 bg-[#D4A574] rounded-full"></div>
                    <div class="h-px w-16 bg-[#D4A574]/40"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                {{-- Map --}}
                <div class="rounded-2xl overflow-hidden border-2 border-[#5D4037] shadow-2xl">
                    @if(!empty($settings['location_map_embed']))
                        <div class="aspect-video">
                            {!! $settings['location_map_embed'] !!}
                        </div>
                    @else
                        <div class="aspect-video bg-[#4E342E] flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 mx-auto text-[#8D6E63] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <p class="text-[#8D6E63]">Google Maps Placeholder</p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="flex flex-col justify-center gap-8">
                    {{-- Address --}}
                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-[#D4A574]/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#D4A574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-playfair text-xl font-bold text-white mb-1">Alamat</h3>
                            <p class="text-[#D7CCC8]">{{ $settings['location_address'] ?? 'Alamat belum diatur' }}</p>
                        </div>
                    </div>

                    {{-- Hours --}}
                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-[#D4A574]/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#D4A574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-playfair text-xl font-bold text-white mb-1">Jam Operasional</h3>
                            <p class="text-[#D7CCC8] text-lg">{{ $settings['operating_hours'] ?? '18.30 WIB - 24.00 WIB (Every Day)' }}</p>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-green-400 text-sm font-medium">Buka Setiap Hari</span>
                            </div>
                        </div>
                    </div>

                    {{-- WhatsApp CTA --}}
                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-green-500/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-green-400" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-playfair text-xl font-bold text-white mb-2">Pesan via WhatsApp</h3>
                            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}?text=Halo%20Aksara%20Coffe,%20saya%20ingin%20memesan" target="_blank"
                               class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full text-sm font-semibold transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Chat Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======== FOOTER ======== --}}
    <footer class="bg-[#2C1A14] py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center gap-3 mb-4">
                    @if(!empty($settings['logo_path']))
                        <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffe" class="w-8 h-8 rounded-full object-contain">
                    @endif
                    <span class="font-playfair text-xl font-bold text-white">Aksara Coffe</span>
                </div>
                <p class="text-[#8D6E63] italic mb-4">"{{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}"</p>
                <div class="h-px w-24 bg-[#5D4037] mx-auto mb-4"></div>
                <p class="text-[#8D6E63] text-sm">&copy; {{ date('Y') }} Aksara Coffe. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- ======== FLOATING WHATSAPP BUTTON ======== --}}
    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '6281234567890' }}?text=Halo%20Aksara%20Coffe,%20saya%20ingin%20memesan"
       target="_blank"
       id="waButton"
       class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 transform hover:scale-110 pulse-glow group"
       title="Pesan via WhatsApp">
        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        {{-- Tooltip --}}
        <span class="absolute right-20 bg-[#3E2723] text-white text-sm px-4 py-2 rounded-xl whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity shadow-xl pointer-events-none">
            Pesan via WhatsApp
        </span>
    </a>

    {{-- ======== NAVBAR SCROLL EFFECT ======== --}}
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 80) {
                navbar.style.background = 'rgba(62,39,35,0.95)';
                navbar.style.backdropFilter = 'blur(20px)';
                navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.15)';
            } else {
                navbar.style.background = 'transparent';
                navbar.style.backdropFilter = 'none';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>
