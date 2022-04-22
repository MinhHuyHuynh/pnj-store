<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if(!(session()->has('user')))
        {
            return view('admin.login');
        }
        return redirect('admin/order');
    }
    public function store(Request $request)
    {
        $user = DB::table('user')->where('email',$request->email)->where('password',$request->password)->first();
        if($user)
        {
            Session::put('user', $user);
           return redirect('admin/order');
        }else {
            $result = "sai mật khẩu hoặc tài khoản";
            return redirect('login')->with('result',$result);
        }
    }
    public function logout()
    {
        session()->forget('user');
        return redirect('login');
    }
}
