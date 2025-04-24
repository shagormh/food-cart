<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BrandSeeder extends Seeder
{

    public function run()
    {
        $now = Carbon::now();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('brands')->insert([
            [
                'id' => 14,
                'name' => 'Fast Food King',
                'slug' => 'fast-food-king',
                'image' => 'brands/fast-food-king.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 15,
                'name' => 'Premium Beverages',
                'slug' => 'premium-beverages',
                'image' => 'brands/premium-beverages.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 16,
                'name' => 'Sweet Delights',
                'slug' => 'sweet-delights',
                'image' => 'brands/sweet-delights.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 17,
                'name' => 'Traditional Cuisine',
                'slug' => 'traditional-cuisine',
                'image' => 'brands/traditional-cuisine.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 18,
                'name' => 'Health Foods',
                'slug' => 'health-foods',
                'image' => 'brands/health-foods.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 19,
                'name' => 'Fresh Grocery',
                'slug' => 'fresh-grocery',
                'image' => 'brands/fresh-grocery.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 20,
                'name' => 'Spice Masters',
                'slug' => 'spice-masters',
                'image' => 'brands/spice-masters.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 21,
                'name' => 'Farm Fresh',
                'slug' => 'farm-fresh',
                'image' => 'brands/farm-fresh.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 22,
                'name' => 'Dairy Direct',
                'slug' => 'dairy-direct',
                'image' => 'brands/dairy-direct.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 23,
                'name' => 'Protein Plus',
                'slug' => 'protein-plus',
                'image' => 'brands/protein-plus.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
