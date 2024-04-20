<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Category;

class CategoriesTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'PC',
                'alias' => 'pc',
                'hidden' => 0,
                'featured' => 0,
                'meta_keyword' => 'pc, máy tính để bàn, pc văn phòng, pc gamming',
                'meta_description' => 'PC chất lượng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laptop',
                'alias' => 'laptop',
                'hidden' => 0,
                'featured' => 1,
                'meta_keyword' => 'laptop, máy tính để bàn, laptop văn phòng, laptop gamming',
                'meta_description' => 'Danh mục laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Linh kiện',
                'alias' => 'linh-kien',
                'hidden' => 0,
                'featured' => 1,
                'meta_keyword' => 'Linh kiện, linh kiện máy tính để bàn, linh kiện laptop văn phòng, linh kiện laptop gamming',
                'meta_description' => 'Danh mục Linh kiện',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camera',
                'alias' => 'camera',
                'hidden' => 0,
                'featured' => 1,
                'meta_keyword' => 'Camera',
                'meta_description' => 'Danh mục Camera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Năng lượng mặt trời',
                'alias' => 'nang-luong-mat-troi',
                'hidden' => 0,
                'featured' => 1,
                'meta_keyword' => 'Năng lượng mặt trời',
                'meta_description' => 'Danh mục Năng lượng mặt trời',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Thêm các bản ghi khác tại đây
        ];

        DB::table('categories')->insert($categories);
        // Category::factory(20)->create();
    }
}
