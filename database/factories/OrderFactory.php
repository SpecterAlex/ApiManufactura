<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Customer;
use App\Models\ProductionOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order' => $this->faker->order(),
            'comments' => $this->faker->comments(),
            'total_order' => (string)$this->faker->numerify('####'),
            'user_id' => User::all()->random()->id,
            'shipping_id' => (string)$this->faker->numerify('#####'),
            'production_order_id' => ProductionOrder::all()->random()->id,
            'customer_id' => Customer::all()->random()->id,
        ];
    }
}
