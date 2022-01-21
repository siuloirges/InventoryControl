<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'picture' => "https://picsum.photos/200/300",
            'name' => $this->faker->name(),
            'price' => "100000",
            'commercial_sale_price' => "1000000",
            'type' => Products::PRODUCT,
            'categories_id' =>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'stores_id' =>"1",
            'expiration_date' => $this->faker->dateTime(),
            'description' => $this->faker->sentence(),
            'brands_id' =>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'Barcode' => $this->faker->randomElement(["100","002","003","004","005","006","007","008","009"]),
            'sku' => "3",

        ];
    }
}
