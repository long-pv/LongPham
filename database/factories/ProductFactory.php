<?php

namespace Database\Factories;

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
        return [
            'title' => $this->faker->text(100),
            'slug' => Str::slug($this->faker->unique()->text(100)),
            'price' => $this->faker->numerify(),
            'quantity' => $this->faker->numberBetween(1, 1000),
            'sale_off' => $this->faker->numerify(),
            'user_id' => 1,
            'category_id' => rand(1, 7),
        ];
    }
}
