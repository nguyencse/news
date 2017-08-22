<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them', ['theloai' => $theloai]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3|max:200'
            ],
            [
                'ten.required' => 'Vui lòng nhập tên loại tin',
                'ten.min' => 'Tên loại tin không được có độ dài nhỏ hơn 3 ký tự',
                'ten.max' => 'Tên loại tin chỉ được có độ dài tối đa là 200 ký tự'
            ]);

        $loaitin = new LoaiTin();
        $loaitin->id_theloai = Input::get('tentheloai');
        $loaitin->ten = $request->ten;
        $loaitin->tenkhongdau = changeTitle($request->ten);
        $loaitin->save();
        return redirect('admin/loaitin/them')->with('results', 'Đã thêm "' . $loaitin->ten . '"');
    }

    public function getSua($id)
    {
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.loaitin.sua', ['loaitin' => $loaitin, 'theloai' => $theloai]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3|max:200'
            ],
            [
                'ten.required' => 'Vui lòng điền vào tên loại tin',
                'ten.min' => 'Tên loại tin không được có độ dài nhỏ hơn 3 ký tự',
                'ten.max' => 'Tên loại tin chỉ được có độ dài tối đa là 200 ký tự'
            ]);

        DB::table('loaitins')->where('id', $id)->update([
            'ten' => $request->ten,
            'id_theloai' => Input::get('tentheloai'),
            'tenkhongdau' => changeTitle($request->ten)
        ]);
        return redirect('admin/loaitin/sua/' . $id)->with('update-result', 'Cập nhật "' . LoaiTin::find($id)->ten . '" thành công');
    }

    public function getXoa($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('delete-result', 'Đã xóa "' . $loaitin->ten . '"');
    }
}