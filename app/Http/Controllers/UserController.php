<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'pass' => 'required|min:6|max:25',
                'email' => 'required|email|unique:users'
            ],
            [
                'name.required' => 'Vui lòng nhập vào tên người dùng',
                'name.min' => 'Tên người dùng phải có độ dài tối thiểu là 3 ký tự',
                'name.max' => 'Tên người dùng chỉ được có độ dài tối đa là 100 ký tự',
                'pass.required' => 'Vui lòng nhập vào mật khẩu',
                'pass.min' => 'Mật khẩu phải có độ dài tối thiểu là 6 ký tự',
                'pass.max' => 'Mật khẩu chỉ được có độ dài tối đa là 25 ký tự',
                'email.required' => 'Vui lòng nhập vào email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được sử dụng'
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->quyen = Input::get('rdoLevel');
        $user->save();

        return redirect('admin/user/them')->with('add-result', 'Thêm người dùng thành công');
    }
}
