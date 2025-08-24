<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Electronics', 'Fashion', 'Grocery', 'Books', 'Sports'];

        for ($i = 1; $i <= 10; ++$i) {
            DB::table('products')->insert([
                'product_name' => 'Product '.$i,
                'product_description' => 'This is a sample description for product '.$i,
                'category_name' => $categories[array_rand($categories)],
                'status' => rand(0, 1), // randomly Active / Inactive
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
