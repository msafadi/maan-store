<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['in-stock', 'sold-out'];
        $name = $this->faker->words(4, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'category_id' => Category::inRandomOrder()->limit(1)->first()->id,
            'status' => $status[random_int(0, 1)],
            'image_path' => $this->faker->imageUrl(),
            'description' => $this->faker->words(250, true),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'sale_price' => null,
            'quantity' => $this->faker->randomDigit()
        ];
    }
}
