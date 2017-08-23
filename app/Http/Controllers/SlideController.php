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
}