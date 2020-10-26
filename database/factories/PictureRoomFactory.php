<?php

namespace Database\Factories;

use App\Models\PictureRoom;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PictureRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'http://placeimg.com/640/360/any',
            'room_id' => Room::all()->random()->id
        ];
    }
}
