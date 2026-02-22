<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenus = Menu::count();
        $totalCategories = Category::count();
        $activeMenus = Menu::where('is_active', true)->count();

        return view('admin.dashboard', compact('totalMenus', 'totalCategories', 'activeMenus'));
    }
}
