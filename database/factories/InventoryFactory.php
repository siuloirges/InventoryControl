<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\This;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stocks_id'=>"1",
//            'stores_id'=>"1",
            'imei'=>$this->faker->unique()->name(),
            'is_sold'=>$this->faker->randomElement([0]),
            'order_id'=>'0',
            'reference'=>"",
        ];
    }
}
