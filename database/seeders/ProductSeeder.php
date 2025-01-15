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
                'name' => 'Man Shirt',
                'description' => 'A stylish shirt for men.',
                'price' => 29.99,
                'stock' => 50,
                'image' => 'products/man.jpg',
            ],
            [
                'name' => 'Woman Dress',
                'description' => 'An elegant dress for women.',
                'price' => 49.99,
                'stock' => 30,
                'image' => 'products/woman.jpg',
            ],
            [
                'name' => 'Kids Jacket',
                'description' => 'A warm jacket for kids.',
                'price' => 39.99,
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
