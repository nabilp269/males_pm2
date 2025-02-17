<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Crispy Bread',
                'image' => 'images/crispy_bread.jpg',
                'description' => 'Roti renyah dengan rasa yang lezat',
                'price' => 10000,
            ],
            [
                'name' => 'Choco Roll',
                'image' => 'images/choco_roll.jpg',
                'description' => 'Roti gulung cokelat yang manis',
                'price' => 12000,
            ],
        ]);
    }
}

