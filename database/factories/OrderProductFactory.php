<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => (string)$this->faker->numerify('####'),
            'total_product' => (string)$this->faker->numerify('####'),
            'order_id' => Order::all()->random()->id,
            'product_id' => Product::all()->random()->id,
        ];
    }
}
