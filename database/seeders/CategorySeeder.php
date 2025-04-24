<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        $categories = [
            [
                'id' => 1,
                'name' => 'Fast Food',
                'slug' => 'fast-food',
                'image' => 'categories/fast-food.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'name' => 'Beverages',
                'slug' => 'beverages',
                'image' => 'categories/beverages.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'name' => 'Desserts & Sweets',
                'slug' => 'desserts-sweets',
                'image' => 'categories/desserts-sweets.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'name' => 'Traditional Food',
                'slug' => 'traditional-food',
                'image' => 'categories/traditional-food.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'name' => 'Healthy Food',
                'slug' => 'healthy-food',
                'image' => 'categories/healthy-food.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // [
            //     'id' => 6,
            //     'name' => 'Kacha Bazar',
            //     'slug' => 'kacha-bazar',
            //     'image' => 'categories/kacha-bazar.jpg',
            //     'parent_id' => null,
            //     'created_at' => $now,
            //     'updated_at' => $now,
            // ],
            [
                'id' => 6,
                'name' => 'Rice (Chal)',
                'slug' => 'rice-chal',
                'image' => 'categories/rice.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 7,
                'name' => 'Lentils (Dal)',
                'slug' => 'lentils-dal',
                'image' => 'categories/lentils.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 8,
                'name' => 'Vegetables',
                'slug' => 'vegetables',
                'image' => 'categories/vegetables.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 9,
                'name' => 'Fruits',
                'slug' => 'fruits',
                'image' => 'categories/fruits.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 10,
                'name' => 'Spices & Masala',
                'slug' => 'spices-masala',
                'image' => 'categories/spices.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 11,
                'name' => 'Other Essential Items',
                'slug' => 'other-essential-items',
                'image' => 'categories/essentials.jpg',
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        DB::table('categories')->insert($categories);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
