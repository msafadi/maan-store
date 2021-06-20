<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['active', 'inactive'];
        $name = $this->faker->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => Category::inRandomOrder()->limit(1)->first()->id,
            'status' => $status[random_int(0, 1)],
            'image_path' => $this->faker->imageUrl(),
            'description' => $this->faker->words(250, true),
        ];
    }
}
