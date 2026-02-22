<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $coffee = Category::where('slug', 'coffee')->first();
        $nonCoffee = Category::where('slug', 'non-coffee')->first();

        $coffeeMenus = [
            ['name' => 'Espresso', 'description' => 'Kopi espresso murni dengan rasa bold dan aroma intens', 'price' => 15000, 'order' => 1],
            ['name' => 'Americano', 'description' => 'Espresso dengan tambahan air panas, rasa smooth dan clean', 'price' => 18000, 'order' => 2],
            ['name' => 'Cappuccino', 'description' => 'Espresso dengan steamed milk dan foam lembut', 'price' => 22000, 'order' => 3],
            ['name' => 'Caffe Latte', 'description' => 'Espresso dengan susu steamed yang creamy dan lembut', 'price' => 23000, 'order' => 4],
            ['name' => 'Mocha', 'description' => 'Perpaduan espresso, cokelat, dan susu yang manis', 'price' => 25000, 'order' => 5],
            ['name' => 'Vanilla Latte', 'description' => 'Latte dengan sentuhan vanilla yang harum dan manis', 'price' => 25000, 'order' => 6],
            ['name' => 'Caramel Macchiato', 'description' => 'Espresso dengan susu dan drizzle karamel manis', 'price' => 26000, 'order' => 7],
            ['name' => 'Kopi Susu Gula Aren', 'description' => 'Espresso dengan susu segar dan gula aren asli', 'price' => 20000, 'order' => 8],
        ];

        $nonCoffeeMenus = [
            ['name' => 'Thai Tea', 'description' => 'Teh Thailand klasik dengan susu yang creamy', 'price' => 18000, 'order' => 1],
            ['name' => 'Matcha Latte', 'description' => 'Green tea matcha Jepang premium dengan susu', 'price' => 23000, 'order' => 2],
            ['name' => 'Chocolate', 'description' => 'Cokelat premium yang rich dan creamy', 'price' => 22000, 'order' => 3],
            ['name' => 'Lemon Tea', 'description' => 'Teh segar dengan perasan lemon alami', 'price' => 15000, 'order' => 4],
            ['name' => 'Fresh Orange', 'description' => 'Jus jeruk segar alami tanpa tambahan gula', 'price' => 18000, 'order' => 5],
            ['name' => 'Taro Latte', 'description' => 'Minuman taro creamy dengan rasa manis alami', 'price' => 22000, 'order' => 6],
            ['name' => 'Red Velvet', 'description' => 'Minuman red velvet creamy yang manis dan lembut', 'price' => 23000, 'order' => 7],
            ['name' => 'Milo Dinosaur', 'description' => 'Milo dingin dengan taburan bubuk Milo di atas', 'price' => 20000, 'order' => 8],
        ];

        foreach ($coffeeMenus as $menu) {
            Menu::create(array_merge($menu, ['category_id' => $coffee->id, 'is_active' => true]));
        }

        foreach ($nonCoffeeMenus as $menu) {
            Menu::create(array_merge($menu, ['category_id' => $nonCoffee->id, 'is_active' => true]));
        }
    }
}
