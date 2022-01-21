<?php

namespace Database\Factories;

use App\Models\OrdersDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrdersDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'orders_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'products_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'products_name'=>$this->faker->name(),
            'products_price'=>$this->faker->randomDigit(),
            'quantity'=>$this->faker->randomDigit(),
            'sub_total'=>$this->faker->randomDigit(),
            'products_sku'=>$this->faker->randomDigit(),
        ];
    }
}
