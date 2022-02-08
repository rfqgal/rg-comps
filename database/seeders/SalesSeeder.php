<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeded 2 times
        $faker = Factory::create('id_ID');
        
        $date = 9;
        $month = 2;

        for ($i=0; $i<30; $i++) {
            if ($date-$i>0) {
                DB::table('sales')->insert([
                    'date' => Carbon::create(2022, $month, $date-$i),
                    'buyer' => $faker->name,
                    'buyer_address' => $faker->address,
                ]);
            } 
            else {
                DB::table('sales')->insert([
                    'date' => Carbon::create(2022, $month-1, 31+$date-$i),
                    'buyer' => $faker->name,
                    'buyer_address' => $faker->address,
                ]);
            }
        }
    }
}
