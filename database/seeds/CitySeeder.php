<?php

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
        $data = array(
            ['city_name' => 'TPHCM'],
            ['city_name' => 'Hà Nội'],
            ['city_name' => 'Hải Phòng'],
            ['city_name' => 'Đà Nẵng'],
            ['city_name' => 'Cần Thơ'],
            ['city_name' => 'Sóc Trăng'],
            ['city_name' => 'Hậu Giang'],
            ['city_name' => 'Vĩnh Long'],
            ['city_name' => 'An Giang'],
            ['city_name' => 'Ca Mau'],
        );

        DB::table('cities')->insert($data);
    }
}
