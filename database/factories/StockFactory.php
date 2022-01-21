<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stores_id'=>"1",
            'products_id'=>"1",
            'cost'=>'2000',
            'price_products'=>'1000000',
            'cms_users_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'suppliers_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'stock'=>"20",
            'stock_in'=>"20",
            'stock_out'=>"0",
            'description' => "",
        ];
    }
}
