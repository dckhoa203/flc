<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'Admin',
                'role' => 0,
                'tel' => '0123456789',
                'branch_id' => NULL,
            ],
            [
                'email' => 'congtacvien1@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'CTV1',
                'role' => 1,
                'tel' => '0123456788',
                'branch_id' => 1,
            ],
            [
                'email' => 'congtacvien2@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'CTV2',
                'role' => 1,
                'tel' => '0123456787',
                'branch_id' => 1,
            ],
            [
                'email' => 'congtacvien3@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'CTV3',
                'role' => 1,
                'tel' => '0123456786',
                'branch_id' => 1,
            ],
            [
                'email' => 'thanhvien1@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'TV1',
                'role' => 2,
                'tel' => '0123456785',
                'branch_id' => NULL,
            ],
            [
                'email' => 'thanhvien2@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'TV2',
                'role' => 2,
                'tel' => '0123456784',
                'branch_id' => NULL,
            ],
            [
                'email' => 'thanhvien3@gmail.com',
                'password' => Hash::make('123456789'),
                'name' => 'TV3',
                'role' => 2,
                'tel' => '012345673',
                'branch_id' => NULL,
            ]
        );

        DB::table('users')->insert($data);
    }
}
