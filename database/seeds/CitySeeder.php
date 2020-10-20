<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->truncate();

        $cities = [
            ['name' => 'Mumbai'],
            ['name' => 'Bengaluru'],
            ['name' => 'Chennai'],
            ['name' => 'Kolkata'],
            ['name' => 'Hyderabad'],
            ['name' => 'Ahmedabad'],
            ['name' => 'Delhi'],
            ['name' => 'Pune'],
            ['name' => 'Jaipur'],
            ['name' => 'Surat'],
            ['name' => 'Chandigarh'],
            ['name' => 'Lucknow'],
            ['name' => 'Bopal'],
            ['name' => 'Patna'],
            ['name' => 'Kochi'],
            ['name' => 'Kanpur'],
            ['name' => 'Nagpur'],
            ['name' => 'Varanasi'],
            ['name' => 'Agrs'],
            ['name' => 'Nashik'],
            ['name' => 'Raipur'],
            ['name' => 'Noida'],
            ['name' => 'Vadodara'],
            ['name' => 'Guwahati'],
            ['name' => 'Amritsar'],
            ['name' => 'Ludhiana'],
            ['name' => 'Shimla'],
            
        ];

        DB::table('cities')->insert($cities);
    }
}
