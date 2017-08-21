<?php

use Illuminate\Database\Seeder;

class LoaiTinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaitins')->insert([
            ['id_theloai'=>'1','ten' => 'Giáo Dục','tenkhongdau' => 'Giao-Duc'],
            ['id_theloai'=>'1','ten' => 'Nhịp Điệu Trẻ','tenkhongdau' => 'Nhip-Dieu-Tre'],
            ['id_theloai'=>'1','ten' => 'Du Lịch','tenkhongdau' => 'Du-Lich'],
            ['id_theloai'=>'1','ten' => 'Du Học','tenkhongdau' => 'Du-Hoc'],
            ['id_theloai'=>'2','ten' => 'Cuộc Sống Đó Đây','tenkhongdau' => 'Cuoc-Song-Do-Day'],
            ['id_theloai'=>'2','ten' => 'Ảnh','tenkhongdau' => 'Anh'],
            ['id_theloai'=>'2','ten' => 'Người Việt 5 Châu','tenkhongdau' => 'Nguoi-Viet-5-Chau'],
            ['id_theloai'=>'2','ten' => 'Phân Tích','tenkhongdau' => 'Phan-Tich'],
            ['id_theloai'=>'3','ten' => 'Chứng Khoán','tenkhongdau' => 'Chung-Khoan'],
            ['id_theloai'=>'3','ten' => 'Bất Động Sản','tenkhongdau' => 'Bat-Dong-San'],
            ['id_theloai'=>'3','ten' => 'Doanh Nhân','tenkhongdau' => 'Doanh-Nhan'],
            ['id_theloai'=>'3','ten' => 'Quốc Tế','tenkhongdau' => 'Quoc-Te'],
            ['id_theloai'=>'3','ten' => 'Mua Sắm','tenkhongdau' => 'Mua-Sam'],
            ['id_theloai'=>'3','ten' => 'Doanh Nghiệp Viết','tenkhongdau' => 'Doanh-Nghiep-Viet'],
            ['id_theloai'=>'4','ten' => 'Hoa Hậu','tenkhongdau' => 'Hoa-Hau'],
            ['id_theloai'=>'4','ten' => 'Nghệ Sỹ','tenkhongdau' => 'Nghe-Sy'],
            ['id_theloai'=>'4','ten' => 'Âm Nhạc','tenkhongdau' => 'Am-Nhac'],
            ['id_theloai'=>'4','ten' => 'Thời Trang','tenkhongdau' => 'Thoi-Trang'],
            ['id_theloai'=>'4','ten' => 'Điện Ảnh','tenkhongdau' => 'Dien-Anh'],
            ['id_theloai'=>'4','ten' => 'Mỹ Thuật','tenkhongdau' => 'My-Thuat'],
            ['id_theloai'=>'5','ten' => 'Bóng Đá','tenkhongdau' => 'Bong-Da'],
            ['id_theloai'=>'5','ten' => 'Tennis','tenkhongdau' => 'Tennis'],
            ['id_theloai'=>'5','ten' => 'Chân Dung','tenkhongdau' => 'Chan-Dung'],
            ['id_theloai'=>'5','ten' => 'Ảnh','tenkhongdau' => 'Anh-TT'],
            ['id_theloai'=>'6','ten' => 'Hình Sự','tenkhongdau' => 'Hinh-Su']
        ]);
    }
}
