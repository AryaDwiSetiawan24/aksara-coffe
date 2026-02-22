<x-admin-layout>
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}" class="text-[#6F4E37] hover:text-[#3E2723] text-sm flex items-center gap-1 mb-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
        <h1 class="text-2xl font-bold text-[#3E2723]">Edit Kategori</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 max-w-xl mx-auto">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf @method('PUT')
            <div class="space-y-5">
                <div>
                    <label for="name" class="block text-sm font-medium text-[#3E2723] mb-1.5">Nama Kategori</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>
                <div>
                    <label for="order" class="block text-sm font-medium text-[#3E2723] mb-1.5">Urutan</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $category->order) }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>
                <button type="submit" class="bg-[#6F4E37] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#5D4037] transition">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
