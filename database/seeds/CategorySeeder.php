<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['category_name' => 'Luyện thi TOEIC'],
            ['category_name' => 'Luyện thi IELTS'],
            ['category_name' => 'Luyện thi TOEFL'],
            ['category_name' => 'Luyện thi 6 bậc chuẩn Châu Âu'],
            ['category_name' => 'Tiếng Anh căn bản'],
            ['category_name' => 'Tiếng Anh giao tiếp'],
            ['category_name' => 'Tiếng Anh trẻ em'],
            ['category_name' => 'Tiếng Nhật căn bản '],
            ['category_name' => 'Luyện thi tiếng Nhật'],
            ['category_name' => 'Tiếng Hàn căn bản'],
            ['category_name' => 'Tiếng thi tiếng Hàn'],
            ['category_name' => 'Luyện Trung căn bản'],
            ['category_name' => 'Luyện thi tiếng Trung'],
        );

        DB::table('categories')->insert($data);
    }
}
