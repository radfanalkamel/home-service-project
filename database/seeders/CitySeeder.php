<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('cities')->insert([
         'name' => 'صنعاء',
        ]);

        DB::table('cities')->insert([
            'name' => 'تعز',
           ]);


        DB::table('cities')->insert([
            'name' => 'اب',
        ]);
           
           
    }
}
