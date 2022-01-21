<?php

namespace Database\Factories;

use App\Models\SmsUsers;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsUsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmsUsers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'photo'=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
            'email'=>"operador@operador.com",
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'id_cms_privileges'=>'2',
            'status'=>'Active'
        ];
    }
}
