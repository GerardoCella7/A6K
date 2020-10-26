<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->numberBetween(1, 50) * 100,
            'seats_number' => $this->faker->numberBetween(1, 100),
            'area' => $this->faker->randomFloat(2, 1, 100)
        ];
    }
}
