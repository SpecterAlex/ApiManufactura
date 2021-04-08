<?php

namespace Database\Factories;

use App\Models\ProductionLineProduct;
use App\Models\Product;
use App\Models\ProductionLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductionLineProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductionLineProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::all()->random()->id,
            'production_line_id' => ProductionLine::all()->random()->id,
        ];
    }
}
