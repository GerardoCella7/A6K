<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName(),
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'tva' => $this->faker->bothify('BE####.###.###'),
            'company_type' => $this->faker->sentence(3, false)
        ];
    }
}
