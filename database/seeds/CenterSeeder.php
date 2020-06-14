<?php

use Illuminate\Database\Seeder;

class CenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'center_name' => 'Trung tâm ngoại ngữ ĐHCT',
                'website' => 'https://cfl.ctu.edu.vn/',
                'tel' => '',
            ],
            [
                'center_name' => 'Trung tâm Anh ngữ Gia Việt',
                'website' => 'https://giaviet.edu.vn/',
                'tel' => '(84-292) 3 831 000',
            ],
            [
                'center_name' => 'Trung Anh ngữ New Windows',
                'website' => 'http://www.newwindows.edu.vn/',
                'tel' => '02926546567',
            ],
            [
                'centet_name' => 'Trung tâm Anh ngữ AMES',
                'website' => 'https://ames.edu.vn/',
                'tel' => '1800 2098',
            ],
            [
                'centet_name' => 'Trung tâm Anh ngữ Việt Mỹ',
                'website' => 'https://vus.edu.vn/',
                'tel' => '',
            ]
        );

        DB::table('centers')->insert($data);
    }
}
