<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'categories_id' => 1,
                'subcategories_id' => 1,
                'brands_id' => 1,
                'name' => 'Pc 1',
                'alias' => 'pc-a1',
            ],
            [
                'categories_id' => 1,
                'subcategories_id' => 1,
                'brands_id' => 1,
                'name' => 'Pc 1',
                'alias' => 'pc-a12',
            ],
            [
                'categories_id' => 1,
                'subcategories_id' => 1,
                'brands_id' => 1,
                'name' => 'Pc 1',
                'alias' => 'pc-a13',
            ],
            [
                'categories_id' => 1,
                'subcategories_id' => 1,
                'brands_id' => 1,
                'name' => 'Pc 1',
                'alias' => 'pc-a14',
            ],
            [
                'categories_id' => 1,
                'subcategories_id' => 2,
                'brands_id' => 2,
                'name' => 'Product 2',
                'alias' => 'product-2',
            ],
            [
                'categories_id' => 2,
                'subcategories_id' => 1,
                'brands_id' => 1,
                'name' => 'Product 3',
                'alias' => 'product-3',
            ],
        ];

        // DB::table('products')->insert($products);
        Product::factory(300)->create();
    }
}
