<?php

namespace App\Http\Controllers;

use App\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach')->with('theloai', $theloai);
    }

    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua', ['theloai' => $theloai]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3|max:100'
            ],
            [
                'ten.required' => 'Vui lòng nhập vào tên thể loại',
                'ten.min' => 'Tên thể loại phải có độ dài tối thiểu là 3 ký tự',
                'ten.max' => 'Tên thể loại chỉ được có độ dài tối đa là 100 ký tự'
            ]);

        DB::table('theloais')->where('id', $id)->update([
            'ten' => $request->ten,
            'tenkhongdau' => changeTitle($request->ten)
        ]);

        $theloai = TheLoai::find($id);
        return redirect('admin/theloai/sua/' . $id)->with('results', 'Cập nhật thể loại thành công');
    }

    public function getThem()
    {
        return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:2|max:100'
            ],
            [
                'ten.required' => 'Vui lòng nhập vào tên thể loại',
                'ten.min' => 'Tên thể loại phải có độ dài tối thiểu là 3 ký tự',
                'ten.max' => 'Tên thể loại chỉ được có độ dài tối đa là 100 ký tự'
            ]);

        $theloai = new TheLoai();
        $theloai->ten = $request->ten;
        $theloai->tenkhongdau = changeTitle($request->ten);
        $theloai->save();

        return redirect('admin/theloai/them')->with('results', 'Thêm thể loại thành công');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::findOrFail($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('results', 'Xóa ' . $theloai->ten . ' thành công');
    }
}