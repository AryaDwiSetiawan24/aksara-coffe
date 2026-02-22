<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-[#3E2723]">Dashboard</h1>
        <p class="text-[#6F4E37] mt-1">Selamat datang di panel admin Aksara Coffe</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Total Menu --}}
        <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-[#6F4E37]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#6F4E37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <p class="text-sm text-[#8D6E63]">Total Menu</p>
                    <p class="text-3xl font-bold text-[#3E2723]">{{ $totalMenus }}</p>
                </div>
            </div>
        </div>

        {{-- Kategori --}}
        <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-[#D4A574]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#D4A574]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <div>
                    <p class="text-sm text-[#8D6E63]">Kategori</p>
                    <p class="text-3xl font-bold text-[#3E2723]">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>

        {{-- Menu Aktif --}}
        <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 hover:shadow-md transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <p class="text-sm text-[#8D6E63]">Menu Aktif</p>
                    <p class="text-3xl font-bold text-[#3E2723]">{{ $activeMenus }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.menus.create') }}" class="bg-[#6F4E37] text-white rounded-2xl p-6 hover:bg-[#5D4037] transition flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            </div>
            <div>
                <p class="font-semibold">Tambah Menu Baru</p>
                <p class="text-sm text-white/70">Buat item menu baru untuk ditampilkan</p>
            </div>
        </a>
        <a href="{{ route('admin.settings.edit') }}" class="bg-[#D4A574] text-white rounded-2xl p-6 hover:bg-[#C49464] transition flex items-center gap-4">
            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <p class="font-semibold">Kelola Pengaturan</p>
                <p class="text-sm text-white/70">Ubah moto, lokasi, jam, dan kontak</p>
            </div>
        </a>
    </div>
</x-admin-layout>
