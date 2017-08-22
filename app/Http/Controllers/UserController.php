<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $users = User::all();
        return view('admin.user.danhsach', ['users' => $users]);
    }

    public function getThem()
    {
        return view('admin.user.them');
    }

    public function getXoa($id)
    {
//        $comments = Comment::where('id_user', $id)->get();
//        $comments->delete();
//        $user = User::find($id);
//        $user->delete();
//        return redirect('admin/user/danhsach')->with('delete-result', 'Đã xóa "' . $user->name . '"');
        echo "OK";
    }
}