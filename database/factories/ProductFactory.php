<?php

namespace Database\Factories;

use App\Product;
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
            'title' =>$this->faker->sentence(3),
            'description' =>$this->faker->paragraph(1),
            'pricee' =>$this->faker->randomNumber(),
            'stock' =>$this->faker->numberBetween(1,10),
            'status' =>$this->faker->randomElement(['disponible','nodisponible'])
        ];
    }
}
