<?php

namespace Database\Factories;

use App\Models\ProductionStation;
use App\Models\ProductionLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionStationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionStation::class;

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
            'production_line_id' => ProductionLine::all()->random()->id,
            'capacity_per_hour' => (string)$this->faker->numerify('####'),
        ];
    }
}
