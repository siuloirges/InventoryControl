<?php

namespace Database\Factories;

use App\Models\Customers;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'stores_id'=>"1",
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'phone_other'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'identification_number'=>'1231123123123',
            'description'=>$this->faker->sentence(),
            'department_id'=>1,
            'municipality_id'=>1

        ];
    }
}
