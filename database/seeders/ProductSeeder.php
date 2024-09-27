<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => "Home",
            'description' => 'Your Current Soon To Be Home',
            'image' => "'/img.png'"
        ]);

        Product::create([
            'name' => "Auto",
            'description' => 'Your personal vehicles(s)',
            'image' => "'/img.png'"
        ]);

        Product::create([
            'name' => "Recreational Vehicle",
            'description' => 'Your Boat, RV, Motorcycle, etc',
            'image' => "'/img.png'"
        ]);
    }
}
