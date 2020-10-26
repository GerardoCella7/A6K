<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\PicturesMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

class PicturesMaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PicturesMaterial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'http://placeimg.com/640/360/any',
            'material_id' => Material::all()->random()->id
        ];
    }
}
