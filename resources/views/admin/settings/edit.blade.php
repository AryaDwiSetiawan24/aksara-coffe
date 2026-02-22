<x-admin-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#3E2723]">Pengaturan Website</h1>
        <p class="text-[#6F4E37] mt-1">Kelola konten dan informasi website</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-[#E8DCC8] p-6 max-w-2xl">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-6">
                {{-- Logo --}}
                <div>
                    <label class="block text-sm font-semibold text-[#3E2723] mb-2">Logo</label>
                    @if(!empty($settings['logo_path']))
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $settings['logo_path']) }}" alt="Logo" class="w-20 h-20 rounded-xl object-contain border border-[#E8DCC8] bg-white p-2">
                        </div>
                    @endif
                    <input type="file" name="logo" accept="image/*"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2 text-[#3E2723] file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#6F4E37] file:text-white hover:file:bg-[#5D4037]">
                </div>

                <hr class="border-[#E8DCC8]">

                {{-- Motto --}}
                <div>
                    <label for="motto" class="block text-sm font-semibold text-[#3E2723] mb-1.5">Motto / Tagline</label>
                    <input type="text" name="motto" id="motto" value="{{ old('motto', $settings['motto'] ?? '') }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30"
                           placeholder="Langkah Malam Menuju Kenyamanan">
                </div>

                <hr class="border-[#E8DCC8]">

                {{-- Lokasi --}}
                <div>
                    <label for="location_address" class="block text-sm font-semibold text-[#3E2723] mb-1.5">Alamat Lokasi</label>
                    <input type="text" name="location_address" id="location_address" value="{{ old('location_address', $settings['location_address'] ?? '') }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30">
                </div>

                <div>
                    <label for="location_map_embed" class="block text-sm font-semibold text-[#3E2723] mb-1.5">Google Maps Embed (iframe)</label>
                    <textarea name="location_map_embed" id="location_map_embed" rows="4"
                              class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30 font-mono text-xs">{{ old('location_map_embed', $settings['location_map_embed'] ?? '') }}</textarea>
                    <p class="text-xs text-[#8D6E63] mt-1">Paste kode embed iframe dari Google Maps</p>
                </div>

                <hr class="border-[#E8DCC8]">

                {{-- Jam Operasional --}}
                <div>
                    <label for="operating_hours" class="block text-sm font-semibold text-[#3E2723] mb-1.5">Jam Operasional</label>
                    <input type="text" name="operating_hours" id="operating_hours" value="{{ old('operating_hours', $settings['operating_hours'] ?? '') }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30"
                           placeholder="18.30 WIB - 24.00 WIB (Every Day)">
                </div>

                <hr class="border-[#E8DCC8]">

                {{-- WhatsApp --}}
                <div>
                    <label for="whatsapp_number" class="block text-sm font-semibold text-[#3E2723] mb-1.5">Nomor WhatsApp</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}"
                           class="w-full border border-[#E8DCC8] rounded-xl px-4 py-2.5 text-[#3E2723] focus:ring-2 focus:ring-[#6F4E37] focus:border-transparent bg-[#F5F0E8]/30"
                           placeholder="6281234567890">
                    <p class="text-xs text-[#8D6E63] mt-1">Format internasional tanpa tanda + (contoh: 6281234567890)</p>
                </div>

                <button type="submit" class="bg-[#6F4E37] text-white px-6 py-2.5 rounded-xl text-sm font-medium hover:bg-[#5D4037] transition">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
