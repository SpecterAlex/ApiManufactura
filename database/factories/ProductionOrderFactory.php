<?php

namespace Database\Factories;

use App\Models\ProductionOrder;
use App\Models\ProductionStation;
use App\Models\ProductionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_code' => $this->faker->order_code,
            'quantity' => (string)$this->faker->numerify('####'),
            'production_station_id' => ProductionStation::all()->random()->id,
            'production_status_id' => ProductionStatus::all()->random()->id,
        ];
    }
}
