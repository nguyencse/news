<?php

namespace App\Http\Controllers;

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
}
