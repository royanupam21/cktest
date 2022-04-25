<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 2; $i++) { 

            $obj=new Admin;
            $obj->name=Str::random(8);
            $obj->email=Str::random(12).'@admin.com';
            $obj->phone=$faker->numerify('##########');
            $obj->password=Hash::make('12345678');
            $obj->save();
    	}
    }
}
