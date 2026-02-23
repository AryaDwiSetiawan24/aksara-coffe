<x-admin-layout>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#3E2723]">Menu</h1>
            <p class="text-[#6F4E37] mt-1">Kelola item menu</p>
        </div>
        <a href="{{ route('admin.menus.create') }}" class="bg-[#6F4E37] text-white px-5 py-2.5 rounded-xl text-sm font-medium hover:bg-[#5D4037] transition flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Tambah Menu
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] overflow-hidden">
        <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-[#F5F0E8] whitespace-nowrap">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Menu</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-semibold text-[#6F4E37] uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E8DCC8]">
                @forelse($menus as $menu)
                    <tr class="hover:bg-[#F5F0E8]/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($menu->image)
                                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-12 h-12 rounded-lg object-cover border border-[#E8DCC8]">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-[#E8DCC8] flex items-center justify-center">
                                        <svg class="w-6 h-6 text-[#A67B5B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-[#3E2723]">{{ $menu->name }}</p>
                                    <p class="text-xs text-[#8D6E63] line-clamp-1">{{ $menu->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-[#D4A574]/10 text-[#D4A574] px-3 py-1 rounded-full text-xs font-medium">{{ $menu->category->name }}</span>
                        </td>
                        <td class="px-6 py-4 font-medium text-[#3E2723]">{{ $menu->formatted_price }}</td>
                        <td class="px-6 py-4">
                            @if($menu->is_active)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Aktif</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.menus.edit', $menu) }}" class="text-[#6F4E37] hover:text-[#3E2723] transition p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form id="delete-menu-{{ $menu->id }}" action="{{ route('admin.menus.destroy', $menu) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="showDeleteModal('delete-menu-{{ $menu->id }}', '{{ $menu->name }}')" class="text-red-400 hover:text-red-600 transition p-1">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-[#8D6E63]">Belum ada menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteModal" style="display:none; position:fixed; inset:0; z-index:50; background:rgba(0,0,0,0.5); backdrop-filter:blur(4px);" onclick="if(event.target===this)hideDeleteModal()">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:90%; max-width:400px;" class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8">
            <div class="text-center">
                <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-red-50 flex items-center justify-center">
                    <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#3E2723] mb-1">Hapus Menu</h3>
                <p class="text-sm text-[#8D6E63] mb-5">Apakah Anda yakin ingin menghapus menu <strong id="deleteItemName" class="text-[#3E2723]"></strong>?</p>
                <div class="flex gap-3">
                    <button onclick="hideDeleteModal()" style="flex:1; padding:10px 16px; border-radius:12px; border:1px solid #E8DCC8; color:#6F4E37; font-size:14px; font-weight:500; background:#fff; cursor:pointer;">Batal</button>
                    <button onclick="confirmDelete()" style="flex:1; padding:10px 16px; border-radius:12px; border:none; background:#ef4444; color:#fff; font-size:14px; font-weight:500; cursor:pointer;">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteFormId = null;
        function showDeleteModal(formId, name) {
            deleteFormId = formId;
            document.getElementById('deleteItemName').textContent = name;
            document.getElementById('deleteModal').style.display = 'block';
        }
        function hideDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            deleteFormId = null;
        }
        function confirmDelete() {
            if (deleteFormId) document.getElementById(deleteFormId).submit();
        }
    </script>
</x-admin-layout>
