<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            'name' => 'حدة',
            'city_id' => 1,
        ]);
        DB::table('zones')->insert([
            'name' => 'السنينة',
            'city_id' => 1,
        ]);
        DB::table('zones')->insert([
            'name' => 'مذبح',
            'city_id' => 1,
        ]);
        DB::table('zones')->insert([
            'name' => 'شميلة',
            'city_id' => 1,
        ]);
        DB::table('zones')->insert([
            'name' => 'البتراء',
            'city_id' => 2,
        ]);
        DB::table('zones')->insert([
            'name' => 'القصر',
            'city_id' => 2,
        ]);
        DB::table('zones')->insert([
            'name' => 'العراكم',
            'city_id' => 2,
        ]);
        DB::table('zones')->insert([
            'name' => 'سوفتيل',
            'city_id' => 2,
        ]);
        DB::table('zones')->insert([
            'name' => 'الخشبة',
            'city_id' => 2,
        ]);
        DB::table('zones')->insert([
            'name' => 'ابلان',
            'city_id' => 3,
        ]);
        DB::table('zones')->insert([
            'name' => 'المحافضة',
            'city_id' => 3,
        ]);
        DB::table('zones')->insert([
            'name' => 'المرور',
            'city_id' => 3,
        ]);
    }
}
