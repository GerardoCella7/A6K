<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Material;
use App\Models\MaterialsBasis;
use App\Models\MaterialsOption;
use App\Models\MaterialType;
use App\Models\PictureRoom;
use App\Models\PicturesMaterial;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(10)->create();
        MaterialType::factory(25)->create();
        Material::factory(100)->create();
        Room::factory(25)->create();
        Booking::factory(25)->create();
        PictureRoom::factory(25)->create();
        PicturesMaterial::factory(25)->create();
        MaterialsBasis::factory(100)->create();
        MaterialsOption::factory(50)->create();
    }
}
