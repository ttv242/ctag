<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Brand;

class BrandsTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $brands = [
            [
                'name' => 'Thương hiệu A',
                'alias' => 'thuong-hieu-a',
                'hidden' => 1,
                'featured' => 0,
                'meta_keyword' => 'Thương hiệu A, A',
                'meta_description' => 'Mô tả thương hiệu A',
            ],
            [
                'name' => 'Thương hiệu B',
                'alias' => 'thuong-hieu-b',
                'hidden' => 1,
                'featured' => 0,
                'meta_keyword' => 'Thương hiệu B, B',
                'meta_description' => 'Mô tả thương hiệu B',
            ],
            [
                'name' => 'Thương hiệu C',
                'alias' => 'thuong-hieu-c',
                'hidden' => 1,
                'featured' => 0,
                'meta_keyword' => 'Thương hiệu C, C',
                'meta_description' => 'Mô tả thương hiệu C',
            ],
            [
                'name' => 'Thương hiệu D',
                'alias' => 'thuong-hieu-d',
                'hidden' => 1,
                'featured' => 0,
                'meta_keyword' => 'Thương hiệu D, D',
                'meta_description' => 'Mô tả thương hiệu D',
            ],
        ];

        // DB::table('brands')->insert($brands);
        Brand::factory(5)->create();

    }
}
