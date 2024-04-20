<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Subcategory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subcategory::class;

    public function definition()
    {
        $categoryId = Category::inRandomOrder()->value('id');

        return [
            'categories_id' => $categoryId ?: Category::factory()->create()->id,
            'name' => $this->faker->word,
            'alias' => $this->faker->slug,
            'hidden' => 0,
            'featured' => $this->faker->boolean,
            'meta_keyword' => $this->faker->words(3, true),
            'meta_description' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
