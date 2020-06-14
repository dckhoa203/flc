<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
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
                'branch_name' => 'Khu 1 – ĐHCT',
                'address' => 'số 411, đường 30/4, TPCT',
                'tel' => ' 0292 36 55 888',
                'image' => '',
                'center_id' => 1,
                'district_id' => 1,
                'user_id' => 2,
            ],
            [
                'branch_name' => 'Khu 2 – ĐHCT',
                'address' => 'đường 3/2, TPCT',
                'tel' => '292 38 30 617',
                'image' => '',
                'center_id' => 1,
                'district_id' => 1,
                'user_id' => 2,
            ],
            [
                'branch_name' => 'Khu 3 – ĐHCT',
                'address' => 'số 01 Lý Tự Trọng, TPCT',
                'tel' => ' 0292 38 31 555',
                'image' => '',
                'center_id' => 1,
                'district_id' => 1,
                'user_id' => 2,
            ],
            [
                'branch_name' => 'Khu Hòa An – ĐHCT',
                'address' => 'Phụng Hiệp – tỉnh Hậu Giang',
                'tel' => '',
                'image' => '',
                'center_id' => 1,
                'district_id' => 1,
                'user_id' => 2,
            ],
            [
                'branch_name' => 'TTAN Gia Việt Mậu Thân',
                'address' => '39 Mậu Thân, phường Xuân Khánh',
                'tel' => '',
                'image' => '',
                'center_id' => 1,
                'district_id' => 1,
                'user_id' => 3,
            ],
            [
                'branch_name' => 'Cơ sở 2 TTAN Gia Việt Mậu Thân',
                'address' => '180 Mậu Thân, phường Xuân Khánh',
                'tel' => '',
                'image' => '',
                'center_id' => 2,
                'district_id' =>  1,
                'user_id' => 3,
            ],
            [
                'branch_name' => 'TTAN Gia Việt đường Lê Bình',
                'address' => '123 Lê Bình, phường Xuân Khánh',
                'tel' => '',
                'image' => '',
                'center_id' => 2,
                'district_id' => 1,
                'user_id' => 3,
            ]
        );
        DB::table('branches')->insert($data);
    }
}
