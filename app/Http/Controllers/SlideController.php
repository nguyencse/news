<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slides = Slide::all();
        return view('admin.slide.danhsach', ['slides' => $slides]);
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('delete-result', 'Xóa dữ liệu thành công');
    }

    public function getThem()
    {
        return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'ten' => 'required|min:3',
                'link' => 'required'
            ],
            [
                'ten.required' => 'Vui lòng điền vào tên slide',
                'ten.min' => 'Tên slide phải có tối thiểu 3 ký tự',
                'link.required' => 'Vui lòng điền vào link chuyển tiếp'
            ]);
        $slide = new Slide();
        $slide->ten = $request->ten;
        $slide->link = $request->link;
        $slide->noidung = $request->noidung;
        if ($request->hasFile('hinh')) {
            if ($request->hinh->isValid()) {
                $file = $request->hinh;
                $fileName = $file->getClientOriginalName();
                $file->move('upload/slide', $fileName);
                $slide->hinh = $fileName;
            }
        } else {
            $slide->hinh = '';
        }
        $slide->save();
        return redirect('admin/slide/them')->withInput()->with('add-result', 'Thêm slide thành công');
    }
}