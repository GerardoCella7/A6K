<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Material;
use App\Models\MaterialsOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialsOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaterialsOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1,100),
            'price' => $this->faker->numberBetween(1,100)*100,
            'material_id' => Material::all()->random()->id,
            'booking_id' => Booking::all()->random()->id
        ];
    }
}
