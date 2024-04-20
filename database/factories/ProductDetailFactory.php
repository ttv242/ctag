<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productId = optional($this->faker->randomElement(Product::pluck('id')))->id;

        $price = $this->faker->numberBetween(1, 1000) * 1000;
        $discount = $this->faker->numberBetween(1, 1000) * 1000;

        if ($discount != 0 && $discount >= $price) {
            $temp = $price;
            $price = $discount;
            $discount = $temp;
        }

        return [
            'parent_id' => $productId,
            'img' => $this->faker->imageUrl(),
            'album' => $this->faker->paragraphs(3, true),
            'price' => $price,
            'discount' => $discount,
            'summary' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(5, true),
            'meta_keyword' => $this->faker->sentence(),
            'meta_description' => $this->faker->paragraphs(5, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
