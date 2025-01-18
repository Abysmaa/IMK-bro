<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data dummy produk
        $products = [
            [
                'category_id' => 1,
                'name' => 'Man Shirt',
                'description' => 'A stylish shirt for men.',
                'price' => 200000,
                'stock' => 50,
                'image' => 'products/man.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'Woman Dress',
                'description' => 'An elegant dress for women.',
                'price' => 200000,
                'stock' => 30,
                'image' => 'products/woman.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'Kids Jacket',
                'description' => 'A warm jacket for kids.',
                'price' => 300000,
                'stock' => 40,
                'image' => 'products/kids.jpg',
            ],
        ];

        // Insert data ke database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
