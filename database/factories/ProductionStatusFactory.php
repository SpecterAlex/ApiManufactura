<?php

namespace Database\Factories;

use App\Models\ProductionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->code,
            'description' => $this->faker->description,
        ];
    }
}
