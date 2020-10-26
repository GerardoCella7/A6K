<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1, 50) * 100,
            'quantity' => $this->faker->numberBetween(1, 100),
            'material_type_id' => MaterialType::all()->random()->id
        ];
    }
}
