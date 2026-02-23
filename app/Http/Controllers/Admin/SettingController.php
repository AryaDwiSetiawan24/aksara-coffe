<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::allSettings();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'motto' => 'nullable|string|max:500',
            'location_address' => 'nullable|string|max:500',
            'location_map_embed' => 'nullable|string',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'instagram_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        $settingsKeys = ['motto', 'location_address', 'location_map_embed', 'operating_hours', 'whatsapp_number', 'instagram_url', 'tiktok_url'];

        foreach ($settingsKeys as $key) {
            if ($request->has($key)) {
                SiteSetting::set($key, $request->input($key));
            }
        }

        if ($request->hasFile('logo')) {
            // Delete old logo
            $oldLogo = SiteSetting::get('logo_path');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            SiteSetting::set('logo_path', $path);
        }

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
}
