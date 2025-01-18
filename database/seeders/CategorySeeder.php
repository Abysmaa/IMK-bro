<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data dummy categories
        $categories = [
            [
                'name' => 'Man Shirt',
                'image' => 'products/man.jpg',
            ],
            [
                'name' => 'Woman Shirt',
                'image' => 'products/woman.jpg',
            ],
            [
                'name' => 'Kids Shirt',
                'image' => 'products/kids.jpg',
            ],
        ];

        // Insert data ke database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
