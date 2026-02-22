<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#3E2723]">Kategori</h1>
            <p class="text-[#6F4E37] mt-1">Kelola kategori menu</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-[#6F4E37] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#5D4037] transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Tambah Kategori
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-[#F5F0E8]">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Jumlah Menu</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Urutan</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E8DCC8]">
                @forelse($categories as $category)
                    <tr class="hover:bg-[#F5F0E8]/50 transition">
                        <td class="px-6 py-4 font-medium text-[#3E2723]">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-sm text-[#8D6E63]">{{ $category->slug }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#6F4E37]/10 text-[#6F4E37] px-3 py-1 rounded-full text-sm font-medium">{{ $category->menus_count }} item</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#8D6E63]">{{ $category->order }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-[#6F4E37] hover:text-[#3E2723] transition p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 transition p-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-[#8D6E63]">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
