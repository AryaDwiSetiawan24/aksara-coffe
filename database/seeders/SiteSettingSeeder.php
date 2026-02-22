<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'motto' => 'Langkah Malam Menuju Kenyamanan',
            'location_address' => 'Jl. Bhayangkara, Bintoro, Demak, Jawa Tengah, Indonesia',
            'location_map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d205.00988618946835!2d110.6348102153601!3d-6.897095284133738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70ebef2ade0ec3%3A0x2362b74522b21f7d!2sSDN%20Bintoro%204!5e1!3m2!1sid!2sid!4v1771743226292!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'operating_hours' => '18.30 WIB - 24.00 WIB (Every Day)',
            'whatsapp_number' => '6281234567890',
            'logo_path' => '',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
