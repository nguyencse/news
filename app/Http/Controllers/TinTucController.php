<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
    }

    public function getThem()
    {
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them', ['loaitin' => $loaitin]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'tieude' => 'required|min:3',
                'tomtat' => 'required|min:3',
                'soluotxem' => 'integer'
            ],
            [
                'tieude.required' => 'Vui lòng nhập vào tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài từ 3 ký tự trở lên',
                'tomtat.required' => 'Vui lòng nhập vào tóm tắt',
                'tomtat.min' => 'Tóm tắt phải có độ dài từ 3 ký tự trở lên',
                'soluotxem.integer' => 'Số lượt xem phải là một số nguyên'
            ]);

        $tintuc = new TinTuc();
        $tintuc->tieude = $request->tieude;
        $tintuc->tieudekhongdau = changeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        $tintuc->noibat = Input::get('chknoibat', 0);
        if (!empty($request->soluotxem)) {
            $tintuc->soluotxem = $request->soluotxem;
        }
        $tintuc->id_loaitin = Input::get('loaitin');
        if ($request->hasFile('hinh')) {
            if ($request->hinh->isValid()) {
                $file = $request->hinh;
                $fileName = $file->getClientOriginalName();
                $file->move('upload/tintuc', $fileName);
                $tintuc->hinh = $fileName;
            }
        } else {
            $tintuc->hinh = '';
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('add-result', 'Thêm tin tức thành công');
    }

    public function getSua($id)
    {
        $tintuc = TinTuc::find($id);
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.sua', ['tintuc' => $tintuc, 'loaitin' => $loaitin]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request,
            [
                'tieude' => 'required|min:3',
                'tomtat' => 'required|min:3',
                'soluotxem' => 'integer'
            ],
            [
                'tieude.required' => 'Vui lòng nhập vào tiêu đề',
                'tieude.min' => 'Tiêu đề phải có độ dài từ 3 ký tự trở lên',
                'tomtat.required' => 'Vui lòng nhập vào tóm tắt',
                'tomtat.min' => 'Tóm tắt phải có độ dài từ 3 ký tự trở lên',
                'soluotxem.integer' => 'Số lượt xem phải là một số nguyên'
            ]);

        $fileName = '';
        if ($request->hasFile('hinh')) {
            if ($request->hinh->isValid()) {
                $file = $request->hinh;
                $fileName = $file->getClientOriginalName();
                $file->move('upload/tintuc', $fileName);
            }
        }
        DB::table('tintucs')->where('id', $id)->update([
            'tieude' => $request->tieude,
            'tieudekhongdau' => changeTitle($request->tieude),
            'tomtat' => $request->tomtat,
            'noidung' => $request->noidung,
            'hinh' => $fileName,
            'noibat' => Input::get('chknoibat', 0),
            'soluotxem' => $request->soluotxem
        ]);
        return redirect('admin/tintuc/sua' . $id)->with('update-result', 'Cập nhật tin tức thành công');
    }

    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('delete-result', 'Đã xóa tin tức');
    }
}
