<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        $categoryId = Category::inRandomOrder()->value('id');
        $subcategoryId = Subcategory::inRandomOrder()->value('id');
        $brandId = Brand::inRandomOrder()->value('id');
        $targetTime = strtotime('+1 month');
        $targetTimeFormatted = date('Y-m-d', $targetTime);

        return [
            'categories_id' => $categoryId ?: Category::factory()->create()->id,
            'subcategories_id' => $subcategoryId ?: Subcategory::factory()->create()->id,
            'brands_id' => $brandId ?: Brand::factory()->create()->id,
            'name' => $this->faker->word,
            'alias' => $this->faker->slug,
            'views' => $this->faker->randomNumber(),
            'best_rated' => $this->faker->randomNumber(),
            'best_seller' => $this->faker->randomNumber(),
            'trend' => $this->faker->boolean,
            'featured' => $this->faker->boolean,
            'hidden' => 0,
            'target_time' => $targetTimeFormatted,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
