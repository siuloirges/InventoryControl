<?php

namespace Database\Factories;

use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuppliersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suppliers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'phone_other'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'credit'=>"123123",

            'stores_id'=>"1",
        ];
    }
}
