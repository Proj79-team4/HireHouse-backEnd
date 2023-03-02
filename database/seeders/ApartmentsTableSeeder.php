<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker){
        


        for($i=0;$i<15;$i++){
            $apartment=new Apartment();
            $apartment->title=$faker->words(3,true);
            $apartment->num_rooms=$faker->randomDigit();
            $apartment->num_beds=$faker->randomDigitNotNull();
            $apartment->num_bathrooms=$faker->randomDigitNotNull();
            $apartment->square_meters=rand(50,400);
            $apartment->full_address=$faker->address();
            $apartment->visibile=rand(0,1);
            $apartment->price=rand(30,100);
            $apartment->description=$faker->text();
            $apartment->check_in="10:00";
            $apartment->check_out="18:00";
            $apartment->latitude=$faker->latitude($min=-90,$max=90);
            $apartment->longitude=$faker->longitude($min=-180,$max=180);
            $apartment->user_id=rand(1,15);
            $apartment->save();

        }

    }
}
