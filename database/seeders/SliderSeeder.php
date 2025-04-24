<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sliders')->insert([
            [
                'tagline' => 'Delicious Burgers, Just a Click Away',
                'title' => 'Burger Heaven',
                'subtitle' => 'Taste the best burgers in town with fresh ingredients and juicy patties!',
                'link' => '/menu/burgers',
                'image' => 'sliders/burger.jpg',
                'status' => 1,
            ],
            [
                'tagline' => 'Refreshing Beverages to Quench Your Thirst',
                'title' => 'Beverage Bliss',
                'subtitle' => 'From soft drinks to smoothies, we\'ve got the perfect drink for every taste.',
                'link' => '/menu/beverages',
                'image' => 'sliders/beverage.jpg',
                'status' => 1,
            ],
            [
                'tagline' => 'Sweet Desserts, Sweet Moments',
                'title' => 'Dessert Delights',
                'subtitle' => 'Indulge in our wide range of mouthwatering desserts.',
                'link' => '/menu/desserts',
                'image' => 'sliders/dessert.jpg',
                'status' => 1,
            ],
            [
                'tagline' => 'Traditional Flavors, Authentic Taste',
                'title' => 'Traditional Food',
                'subtitle' => 'Experience the authentic taste of classic dishes from around the world.',
                'link' => '/menu/traditional',
                'image' => 'sliders/traditional.jpg',
                'status' => 1,
            ],
            [
                'tagline' => 'Healthy and Tasty, the Perfect Combo',
                'title' => 'Healthy Food',
                'subtitle' => 'Enjoy nutritious meals that are as delicious as they are good for you.',
                'link' => '/menu/healthy',
                'image' => 'sliders/healthy.jpg',
                'status' => 1,
            ],
        ]);
    }
}
