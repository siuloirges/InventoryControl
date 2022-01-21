<?php

namespace Database\Factories;

use App\Models\Orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customers_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'stores_id'=>"1",
            'order_number'=>$this->faker->randomDigit(),
            'adress'=>$this->faker->sentence(),
            'state'=>$this->faker->sentence(),
            'municipality_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'department_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'who_receives'=>$this->faker->sentence(),
            'receives_identification_number'=>$this->faker->randomElement([121355345322,12434343452,3456456463]),
            'Description'=>$this->faker->sentence()
        ];
    }
}
