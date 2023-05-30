<?php

namespace Database\Seeders;

use App\Models\Frequency;
use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->getFrequencies();
        $this->getPlants();
    }

    public function getFrequencies()
    {
        $FrequenciesJson = file_get_contents(database_path() . '/frequencies.json');
        $frequencies = json_decode($FrequenciesJson, true)['frequencies'];

        foreach ($frequencies as $frequency) {
            Frequency::firstOrCreate($frequency);
        }
    }
    public function getPlants()
    {
        $PlantsJson = file_get_contents(database_path() . '/plants.json');
        $plants = json_decode($PlantsJson, true)['plants'];

        foreach ($plants as $plant) {
            Plant::firstOrCreate($plant);
        }
    }
}
