<x-admin-layout>
    <div class="mb-6">
        <a href="{{ route('admin.menus.index') }}" class="text-[#6F4E37] hover:text-[#3E2723] text-sm flex items-center gap-1 mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="text-2xl font-bold text-[#3E2723]">Edit Menu</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 max-w-2xl mx-auto">
        <form action="{{ route('admin.menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-[#3E2723] mb-1.5">Kategori</label>
                    <select name="category_id" id="category_id" required
                            class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-[#3E2723] mb-1.5">Nama Menu</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $menu->name) }}" required
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-[#3E2723] mb-1.5">Deskripsi</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">{{ old('description', $menu->description) }}</textarea>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-[#3E2723] mb-1.5">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}" required min="0"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>
                <div>
                    <label for="discount_price" class="block text-sm font-medium text-[#3E2723] mb-1.5">Harga Diskon (Rp)</label>
                    <input type="number" name="discount_price" id="discount_price" value="{{ old('discount_price', $menu->discount_price) }}" min="0"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                    <p class="text-xs text-[#8D6E63] mt-1">Kosongkan jika tidak ada diskon</p>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-[#3E2723] mb-1.5">Gambar</label>
                    @if($menu->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-24 h-24 rounded-lg object-cover border border-[#E8DCC8]">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2 text-[#3E2723] file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#6F4E37] file:text-white hover:file:bg-[#5D4037]">
                    <p class="text-xs text-[#8D6E63] mt-1">Biarkan kosong jika tidak ingin mengganti gambar</p>
                </div>
                <div>
                    <label for="order" class="block text-sm font-medium text-[#3E2723] mb-1.5">Urutan</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $menu->order) }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>
                <div class="flex items-center gap-2">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $menu->is_active) ? 'checked' : '' }}
                           class="rounded border-[#E8DCC8] text-[#6F4E37] focus:ring-[#6F4E37]">
                    <label for="is_active" class="text-sm text-[#3E2723]">Aktif</label>
                </div>
                <button type="submit" class="bg-[#6F4E37] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#5D4037] transition">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
