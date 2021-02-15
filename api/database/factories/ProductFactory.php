<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name'=> $this->faker->word,
            'price' => $this->faker->numberBetween(10000, 60000),
            'category_id' => function () {
                return Category::query()->inRandomOrder()->first()->id;
            },
            'created_by' => function() {
                return User::query()->inRandomOrder()->first()->id;
            }
        ];
    }
}