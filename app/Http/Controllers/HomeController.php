<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['menus' => function ($query) {
            $query->where('is_active', true)->orderBy('order');
        }])->orderBy('order')->get();

        $settings = SiteSetting::allSettings();

        return view('home', compact('categories', 'settings'));
    }
}
