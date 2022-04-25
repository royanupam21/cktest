<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 30; $i++) { 

            $obj=new User;
            $obj->fname=Str::random(8);
            $obj->lname=Str::random(3);
            $obj->email=Str::random(12).'@admin.com';
            $obj->dob=$faker->dateTimeBetween($startDate = '-6 month',$endDate = 'now +6 month');
            $obj->gender=$faker->randomElement(['Male', 'Female']);
            $obj->anual_income=$faker->numerify('#####');
            $obj->occupation= $faker->randomElement(['Private job', 'Government Job', 'Business']);
            $obj->family_type= $faker->randomElement(['Joint family', 'Nuclear family']);
            $obj->mangalik= $faker->randomElement(['Yes', 'No']);
            $obj->password=Hash::make('12345678');
            $obj->save();
    	}
    }
}
