<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Catalogs\Suburb;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName(),
            'number' => (string)$this->faker->numerify('###'),
            'suburb_id' => Suburb::all()->random()->id,
            'phone_number' => (string)$this->faker->numerify('81#######'),
            'customer_id' => Customer::all()->random()->id,
            'invoice' => $this->faker->randomElement([true,false]),
        ];
    }
}
