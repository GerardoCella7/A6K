<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\MaterialsBasis;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialsBasisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaterialsBasis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1,100),
            'room_id' => Room::all()->random()->id,
            'material_id' => Material::all()->random()->id
        ];
    }
}
