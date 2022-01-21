<?php

namespace Database\Factories;

use App\Models\Stores;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identification_number' => 1,
            'name' =>"tienda de ".$this->faker->phoneNumber(),
            'adress'=>$this->faker->sentence(),
            'phone_number'=>"3044566678",
//            'administrator_id'=>"1",
            'description'=>$this->faker->sentence(),
            'picture'=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
        ];
    }
}
