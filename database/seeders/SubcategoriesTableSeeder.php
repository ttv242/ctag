<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Subcategory;


class SubcategoriesTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $subcategories = [
            [
                'categories_id' => 1, // ID của category PC
                'name' => 'PC Gaming',
                'alias' => 'pc-gaming',
                'img' => 'pc-gaming.jpg',
                'hidden' => 1,
                'featured' => 0,
                'meta_keyword' => 'pc gaming, máy tính chơi game, gaming computer',
                'meta_description' => 'Danh mục PC Gaming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 1, // ID của category PC
                'name' => 'PC Văn phòng',
                'alias' => 'pc-van-phong',
                'img' => 'pc-van-phong.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'pc văn phòng, máy tính văn phòng, office computer',
                'meta_description' => 'Danh mục PC Văn phòng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 1, // ID của category PC
                'name' => 'PC cũ',
                'alias' => 'pc-cu',
                'img' => 'pc-van-phong.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'pc cũ, máy tính cũ, office computer',
                'meta_description' => 'Danh mục PC cũ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 2, // ID của category Laptop
                'name' => 'Laptop Gaming',
                'alias' => 'laptop-gaming',
                'img' => 'laptop-gaming.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'laptop gaming, máy tính xách tay chơi game, gaming laptop',
                'meta_description' => 'Danh mục Laptop Gaming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 2, // ID của category Laptop
                'name' => 'Laptop Văn phòng',
                'alias' => 'laptop-van-phong',
                'img' => 'laptop-van-phong.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'laptop văn phòng, máy tính xách tay văn phòng, office laptop',
                'meta_description' => 'Danh mục Laptop Văn phòng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 2, // ID của category Laptop
                'name' => 'Laptop cũ',
                'alias' => 'laptop-cu',
                'img' => 'laptop-cu.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'laptop cũ, máy tính xách tay cũ, office laptop',
                'meta_description' => 'Danh mục Laptop cũ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Bộ vi xử lý (CPU)',
                'alias' => 'bo-vi-xu-ly-cpu',
                'img' => 'bo-vi-xu-ly-cpu.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Bộ vi xử lý (CPU)',
                'meta_description' => 'Bộ vi xử lý (CPU)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Bộ nhớ RAM',
                'alias' => 'bo-nho-ram',
                'img' => 'bo-nho-ram.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Bộ nhớ RAM',
                'meta_description' => 'Bộ nhớ RAM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Ổ cứng (HDD hoặc SSD)',
                'alias' => 'o-cung',
                'img' => 'o-cung.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Ổ cứng (HDD hoặc SSD)',
                'meta_description' => 'Ổ cứng (HDD hoặc SSD)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Card đồ họa (GPU)',
                'alias' => 'card-do-hoa',
                'img' => 'card-do-hoa.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Card đồ họa (GPU)',
                'meta_description' => 'Card đồ họa (GPU)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Bo mạch chủ (Mainboard)',
                'alias' => 'bo-mach-chu',
                'img' => 'bo-mach-chu.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Bo mạch chủ (Mainboard)',
                'meta_description' => 'Bo mạch chủ (Mainboard)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Vỏ máy tính (Case)',
                'alias' => 'vo-may-tinh',
                'img' => 'vo-may-tinh.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Vỏ máy tính (Case)',
                'meta_description' => 'Vỏ máy tính (Case)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Màn hình (Monitor)',
                'alias' => 'man-hinh',
                'img' => 'man-hinh.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Màn hình (Monitor)',
                'meta_description' => 'Màn hình (Monitor)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Bàn phím và chuột',
                'alias' => 'ban-phim-chuot',
                'img' => 'ban-phim-chuot.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Bàn phím và chuột',
                'meta_description' => 'Bàn phím và chuột',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 3, // ID của category Linh kiện
                'name' => 'Loa và tai nghe',
                'alias' => 'loa-tai-nghe',
                'img' => 'loa-tai-nghe.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Loa và tai nghe',
                'meta_description' => 'Loa và tai nghe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 4, // ID của category Camera
                'name' => 'Camera quan sát',
                'alias' => 'camera-quan-sat',
                'img' => 'camera-quan-sat.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Camera quan sát',
                'meta_description' => 'Camera quan sát',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 4, // ID của category Camera
                'name' => 'Camera 360',
                'alias' => 'camera-360',
                'img' => 'camera-360.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Camera 360',
                'meta_description' => 'Camera 360',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 4, // ID của category Camera
                'name' => 'Camera wifi không dây',
                'alias' => 'camera-wifi-khong-day',
                'img' => 'camera-wifi-khong-day.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Camera wifi không dây',
                'meta_description' => 'Camera wifi không dây',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 4, // ID của category Camera
                'name' => 'Camera dùng pin',
                'alias' => 'camera-dung-pin',
                'img' => 'camera-dung-pin.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Camera dùng pin',
                'meta_description' => 'Camera dùng pin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 5, // ID của category Năng lượng mặt trời
                'name' => 'Pin năng lượng mặt trời',
                'alias' => 'pin-nang-luong-mat-troi',
                'img' => 'pin-nang-luong-mat-troi.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Pin năng lượng mặt trời',
                'meta_description' => 'Pin năng lượng mặt trời',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categories_id' => 5,
                'name' => 'Đèn năng lượng mặt trời',
                'alias' => 'den-nang-luong-mat-troi',
                'img' => 'den-nang-luong-mat-troi.jpg',
                'hidden' => 1,
                'featured' => 1,
                'meta_keyword' => 'Đèn năng lượng mặt trời',
                'meta_description' => 'Đèn năng lượng mặt trời',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các bản ghi khác tại đây
        ];

        // DB::table('subcategories')->insert($subcategories);
        Subcategory::factory(50)->create();

    }
}
