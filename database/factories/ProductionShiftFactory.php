<?php

namespace Database\Factories;

use App\Models\ProductionShift;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionShiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionShift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->code,
            'description' => $this->faker->description,
            'total_hours' => (string)$this->faker->numerify('##'),
        ];
    }
}
