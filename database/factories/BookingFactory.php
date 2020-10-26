<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->unixTime();
        $end = $start + $this->faker->numberBetween(15*60, 8*60*60);
        return [
            'start' => date('Y-m-d H:i:s', $start),
            'end' => date('Y-m-d H:i:s', $end),
            'price' => $this->faker->numberBetween(25,250) * 100,
            'cancel_status' => $this->faker->numberBetween(0,1),
            'validation_status' => $this->faker->numberBetween(0,1),
            'client_id' => Client::all()->random()->id,
            'room_id' => Room::all()->random()->id
        ];
    }
}
