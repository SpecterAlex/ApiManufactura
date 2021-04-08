<?php

namespace Database\Factories;

use App\Models\ProductionOrder;
use App\Models\ProductionOrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionOrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionOrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => (string)$this->faker->numerify('####'),
            'production_order_id' => ProductionOrder::all()->random()->id,
        ];
    }
}
