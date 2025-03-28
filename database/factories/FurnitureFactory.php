<?php

namespace Database\Factories;

use App\Models\Furniture; 
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Furniture>
 */
class FurnitureFactory extends Factory
{
    protected $model = Furniture::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'height' => $this->faker->randomFloat(2, 0.5, 2),
            'width' => $this->faker->randomFloat(2, 0.5, 2),
            'depth' => $this->faker->randomFloat(2, 0.5, 2),
            'user_id' => User::factory(),
        ];
    }
}

