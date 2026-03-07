<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @php $faviconPath = \App\Models\SiteSetting::get('logo_path'); @endphp
        @if($faviconPath)
            <link rel="icon" type="image/png" href="{{ asset('storage/' . $faviconPath) }}">
            <link rel="apple-touch-icon" href="{{ asset('storage/' . $faviconPath) }}">
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700&family=inter:300,400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .font-playfair { font-family: 'Playfair Display', serif; }
            .font-inter { font-family: 'Inter', sans-serif; }

            .auth-background {
                background: linear-gradient(135deg, rgba(62,39,35,0.92) 0%, rgba(111,78,55,0.88) 50%, rgba(62,39,35,0.95) 100%);
                position: relative;
                overflow: hidden;
            }
            .auth-background::before {
                content: '';
                position: absolute;
                inset: 0;
                background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4A574' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
                z-index: 0;
            }
            .grain::after {
                content: '';
                position: absolute;
                inset: 0;
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
                pointer-events: none;
                z-index: 0;
            }
        </style>
    </head>
    <body class="font-inter text-[#3E2723] antialiased bg-[#F5F0E8]">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-6 sm:px-6 sm:py-0 auth-background grain">
            
            <div class="relative z-10 w-full max-w-[92vw] sm:max-w-md mt-4 sm:mt-6 px-5 py-6 sm:px-8 sm:py-8 bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl overflow-hidden rounded-2xl sm:rounded-3xl">
                <div class="flex justify-center mb-6 sm:mb-8">
                    <a href="/" class="flex flex-col items-center gap-2 sm:gap-3 group px-4">
                        @php
                            $settings = \App\Models\SiteSetting::allSettings();
                        @endphp
                        @if(!empty($settings['logo_path']))
                            <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Aksara Coffee" class="w-18 h-18 sm:w-24 sm:h-24 rounded-full object-contain border-2 border-[#D4A574]/30 group-hover:border-[#D4A574] transition-colors bg-white/10 backdrop-blur-sm p-1.5 sm:p-2 shadow-lg">
                        @else
                            <div class="w-18 h-18 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-[#D4A574] to-[#A67B5B] flex items-center justify-center border-2 border-[#D4A574]/30 shadow-lg group-hover:scale-105 transition-transform">
                                <span class="text-white font-playfair text-3xl sm:text-4xl font-bold">A</span>
                            </div>
                        @endif
                        <span class="font-playfair text-xl sm:text-2xl font-bold text-white tracking-widest group-hover:text-[#D4A574] transition-colors">Aksara Coffee</span>
                    </a>
                </div>

                {{ $slot }}
            </div>
            
            <!-- Footer text -->
            <div class="relative z-10 mt-5 sm:mt-8 mb-4 text-center px-4">
                <p class="text-white/60 text-xs sm:text-sm italic font-light hover:text-white/80 transition-colors">
                    "{{ $settings['motto'] ?? 'Langkah Malam Menuju Kenyamanan' }}"
                </p>
                <div class="h-px w-12 bg-[#D4A574]/40 mx-auto mt-3 sm:mt-4 mb-3 sm:mb-4"></div>
                <a href="/" class="text-xs sm:text-sm text-[#D4A574] hover:text-white transition-colors tracking-wide font-medium flex items-center justify-center gap-2">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
            
        </div>
    </body>
</html>
