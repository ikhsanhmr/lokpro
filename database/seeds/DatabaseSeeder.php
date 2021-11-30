<?php

use App\Models\City;
use App\Models\Province;
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
        // $this->call(UsersTableSeeder::class);

        // ambil data wilayah dari helpers
        $wilayah = wilayah();
        // create data provinces
        for ($i = 0; $i < count($wilayah); $i++) {
            $provice = array_keys($wilayah)[$i];
            Province::create([
                'name' => $provice
            ]);

            $province_id = Province::orderBy('id', 'desc')->first();
            $cities = $wilayah[$provice];
            // create data citi
            for ($j = 0; $j < count($wilayah[$provice]); $j++) {
                City::create([
                    'name' => $cities[$j],
                    'province_id' => $province_id->id
                ]);
            }
        }
    }
}
