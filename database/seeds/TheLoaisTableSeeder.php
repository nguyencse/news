<?php

use Illuminate\Database\Seeder;

class TheLoaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theloais')->insert([
            ['ten' => 'Xã Hội', 'tenkhongdau' => 'Xa-Hoi'],
            ['ten' => 'Thế Giới', 'tenkhongdau' => 'The-Gioi'],
            ['ten' => 'Kinh Doanh', 'tenkhongdau' => 'Kinh-Doanh'],
            ['ten' => 'Văn Hoá', 'tenkhongdau' => 'Van-Hoa'],
            ['ten' => 'Thể Thao', 'tenkhongdau' => 'The-Thao'],
            ['ten' => 'Pháp Luật', 'tenkhongdau' => 'Phap-Luat'],
            ['ten' => 'Đời Sống', 'tenkhongdau' => 'Doi-Song'],
            ['ten' => 'Khoa Học', 'tenkhongdau' => 'Khoa-Hoc'],
            ['ten' => 'Vi Tính', 'tenkhongdau' => 'Vi-Tinh']
        ]);
    }
}
