<?php

namespace Database\Seeders;

use App\Models\MtCoordinate;
use Illuminate\Database\Seeder;

class CoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    for ($i = 0; $i < 10; $i++) {
        MtCoordinate::insert([
            'latitude' => '-6.286160' . $i,
            'longitude' => '107.286640' . $i,
        ]);
    }
}

}
